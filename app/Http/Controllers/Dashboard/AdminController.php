<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:create_admins,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_admins,guard:admin'])->only('index');
        $this->middleware(['permission:update_admins,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_admins,guard:admin'])->only('destroy');
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
        $admins = Admin::whereRoleIs('admin')->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
            $query->when($request->role, function ($q) use ($request) {
                return $q->whereHas('roles', function ($q2) use ($request) {
                   return $q2->where('id', $request->role);
                });
            });
        })->latest()->paginate(10);
        $roles = Role::whereNotIn('name', ['admin', 'super_admin'])->get();

        return view('dashboard.admins.index', compact('admins', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        return view('dashboard.admins.create', compact('roles'));
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
        try {
            $attributes = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email|string|unique:admins',
                'avatar' => 'image',
                'password' => 'required|string|confirmed|min:6',
                'role' => 'required|exists:roles,id|min:1'
            ]);
            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('admin_avatars');
            }

            $admin = Admin::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'password' => bcrypt($attributes['password']),
                'avatar' => $attributes['avatar'] ?? NULL
            ]);
            $admin->attachRoles(['admin', $attributes['role']]);

            session()->flash('success', 'تم اضافة المشرف بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        if (!auth()->guard('admin')->user()->hasRole('super_admin') && $admin->hasRole('super_admin')) {
            abort('403');
        }

        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        if (!auth()->guard('admin')->user()->hasRole('super_admin') && $admin->hasRole('super_admin')) {
            abort('403');
        }

        try {
            $attributes = $request->validate([
                'name' => 'required|string|max:50',
                'email' => ['required', 'email', 'string', Rule::unique('admins')->ignore($admin)],
                'avatar' => 'image',
                'password' => 'nullable|string|confirmed|min:6',
                'role' => 'required|exists:roles,id|min:1'
            ]);

            if ($request->avatar) {
                //When store a new avatar successfully delete the old avatar
                $attributes['avatar'] = $request->avatar->store('admin_avatars');

                $previousAvatar = $admin->getAttributes()['avatar'];
                if (isset($previousAvatar) && $previousAvatar) {
                    Storage::delete($previousAvatar);
                }
            }
            if ($request->password) {
                $attributes['password'] = bcrypt($attributes['password']);
            } else {
                unset($attributes['password']);
            }

            $admin->update($attributes);
            $admin->syncRoles(['admin', $attributes['role']]);

            session()->flash('success', 'تم تعديل المشرف بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin $admin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        //
        $avatar = $admin->getAttributes()['avatar'];

        try {
            $result = $admin->delete();

            if ($result) {
                if (isset($avatar) && $avatar) {
                    Storage::delete($avatar);
                }
                session()->flash('success', 'تم حذف المشرف بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف المشرف, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.admins.index');
    }
}
