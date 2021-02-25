<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_regions,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_regions,guard:admin'])->only('index');
        $this->middleware(['permission:update_regions,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_regions,guard:admin'])->only('destroy');
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
        $regions = Region::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(10);

        return view('dashboard.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|unique:regions'
        ]);

        Region::create($attributes);

        session()->flash('success', 'تم اضافة المحافظة بنجاح');
        return redirect()->route('dashboard.regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Region $region
     * @return void
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
        return view('dashboard.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|unique:regions,name,' . $region->id
        ]);

        $region->update($attributes);

        session()->flash('success', 'تم تعديل المحافظة بنجاح');
        return redirect()->route('dashboard.regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Region $region
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Region $region)
    {
        //
        $region->delete();

        session()->flash('success', 'تم حذف المحافظة بنجاح');
        return redirect()->route('dashboard.regions.index');
    }
}
