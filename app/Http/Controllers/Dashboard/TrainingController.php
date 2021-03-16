<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Region;
use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $trainings = Training::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%')
                    ->orWhere('requirement', 'like', '%' . $request->search . '%');
            })->when($request->region, function ($q2) use ($request) {
                return $q2->whereHas('region', function ($q2) use ($request) {
                    $q2->where('region_id', $request->region);
                });
            })->when($request->category, function ($q3) use ($request) {
                return $q3->whereHas('category', function ($q3) use ($request) {
                    $q3->where('category_id', $request->category);
                });
            })->when($request->employer, function ($q4) use ($request) {
                return $q4->whereHas('employer', function ($q4) use ($request) {
                    $q4->where('employer_id', $request->employer);
                });
            });
        })->latest()->paginate(10);
        $employers = Employer::where('verified', 1)->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.trainings.index', compact('trainings', 'employers', 'regions', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employers = Employer::where('verified', 1)->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.trainings.create', compact( 'employers', 'regions', 'categories'));
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
            'title' => 'required|string|max:50',
            'employer' => 'required|exists:employers,id',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:350',
            'requirement' => 'required|string|max:350',
            'last_date' => 'required|date',
        ]);
        try {
            Training::create([
                'employer_id' => $attributes['employer'],
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
            ]);

            session()->flash('success', 'تم اضافة التدريب بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.trainings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
        $employers = Employer::where('verified', 1)->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.trainings.edit', compact( 'training', 'employers', 'regions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'employer' => 'required|exists:employers,id',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:350',
            'requirement' => 'required|string|max:350',
            'last_date' => 'required|date',
        ]);
        try {
            $training->update([
                'employer_id' => $attributes['employer'],
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
            ]);

            session()->flash('success', 'تم تعديل التدريب بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.trainings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
        try {
            $training->delete();

            session()->flash('success', 'تم حذف التدريب بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.trainings.index');
    }
}
