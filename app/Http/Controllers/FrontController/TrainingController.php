<?php

namespace App\Http\Controllers\FrontController;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Region;
use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $regions = Region::all();
        $categories = Category::all();

        return view('front.employer.train.create', compact(  'regions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Employer $employer)
    {
        //
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:350',
            'requirement' => 'required|string|max:350',
            'last_date' => 'required|date||after_or_equal:today',
        ]);
        try {
            Training::create([
                'employer_id' => $employer->id,
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
            ]);

        } catch (\Exception $e) {
            return back()->with('failed','يوجد خطأ ما.');
        }
        return back()->with('success','تم اضافة التدريب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('front.train-single', compact('training'));
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
        $employers = Employer::verified()->get();
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
            'last_date' => 'required|date|after:' . $training->created_at,
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
