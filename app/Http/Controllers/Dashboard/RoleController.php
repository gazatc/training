<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_roles,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_roles,guard:admin'])->only('index');
        $this->middleware(['permission:update_roles,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_roles,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $roles = Role::whereNotIn('name', ['admin', 'super_admin'])->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);

        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = [];
        $categories = config('laratrust_seeder.roles_structure.super_admin');
        $operations = config('laratrust_seeder.permissions_map');
        foreach ($categories as $key => $value) {
            $permissions[$key] = [];
            foreach (explode(',', $value) as $p => $perm) {
                foreach ($operations as $key2 => $value2) {
                    if ($perm == $key2) {
                        array_push($permissions[$key], $value2);
                    }
                }
            }
        }
        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array|min:1'
        ]);

        $role = Role::create($attributes);
        $role->attachPermissions($attributes['permissions']);

        session()->flash('success', 'تم اضافية الصلاحية بنجاح');
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        if($role->name == 'super_admin' || $role->name == 'admin'){
            abort(403);
        }

        $permissions = [];
        $categories = config('laratrust_seeder.roles_structure.super_admin');
        $operations = config('laratrust_seeder.permissions_map');
        foreach ($categories as $key => $value) {
            $permissions[$key] = [];
            foreach (explode(',', $value) as $p => $perm) {
                foreach ($operations as $key2 => $value2) {
                    if ($perm == $key2) {
                        array_push($permissions[$key], $value2);
                    }
                }
            }
        }
        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        //
        if($role->name == 'super_admin' || $role->name == 'admin'){
            abort(403);
        }

        $attributes = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array|min:1'
        ]);

        $role->update($attributes);
        $role->syncPermissions($attributes['permissions']);

        session()->flash('success', 'تم تعديل الصلاحية بنجاح');
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        //
        if($role->name == 'super_admin' || $role->name == 'admin'){
            abort(403);
        }

        $role->delete();

        session()->flash('success', 'تم حذف الصلاحية بنجاح');
        return redirect()->route('dashboard.roles.index');
    }
}
