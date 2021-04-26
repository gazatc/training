<?php

namespace App\Http\Controllers\FrontController;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\Region;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //

    public function show(Job $job)
    {

        return view('front.job-single', compact('job'));
    }

    public function create()
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('front.employer.job.create',compact('regions','categories'));
    }

    public function store(Request $request,Employer $employer)
    {
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'jobType' => 'required|in:1,2,3',
            'for' => 'required|in:1,2',
            'salary_type' => 'required|in:1,2',
            'salary_amount' => 'required|numeric|min:2',
            'description' => 'required|string|max:350',
            'requirement' => 'required|string|max:350',
            'last_date' => 'required|date|after_or_equal:today',
        ]);
        try {
            Job::create([
                'employer_id' => $employer->id,
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'jobType' => $attributes['jobType'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
                'salary_type' => $attributes['salary_type'],
                'salary_amount' => $attributes['salary_amount'],
                'for' => $attributes['for'],
            ]);

        } catch (\Exception $e) {
            return back()->with('failed','يوجد خطأ ما.');
        }
        return back()->with('success','تم اضافة العمل بنجاح');
    }
    public function edit(Job $job)
    {

    }

    public function update(Request $request ,Job $job)
    {

    }

    public function destroy(Job $job)
    {
        //
    }
}

