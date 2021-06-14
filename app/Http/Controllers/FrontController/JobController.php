<?php

namespace App\Http\Controllers\FrontController;

use App\Application;
use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\Region;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //

    public function index()
    {
        $employer = auth()->guard('employer')->user();
        $jobs = Job::orderBy('created_at', 'desc')->where('employer_id', $employer->id)->paginate(15);
        return view('front.employer.job.index', compact('jobs'));
    }

    public function show(Job $job)
    {

        return view('front.job-single', compact('job'));
    }

    public function create()
    {
//        if(auth()->guard('employer')->user()->verified == 0){
//            return back()->with('field', 'الرجاء توثيق الحساب حتى تتمكن من اضافة الوظائف');
//        }

        $regions = Region::all();
        $categories = Category::all();
        return view('front.employer.job.create', compact('regions', 'categories'));
    }

    public function store(Request $request, Employer $employer)
    {
        if(auth()->guard('employer')->user()->verified == 0){
            return back()->with('failed', 'الرجاء توثيق الحساب حتى تتمكن من اضافة الوظائف');
        }

        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'jobType' => 'required|in:1,2,3',
            'for' => 'required|in:1,2',
            'salary_type' => 'required|in:1,2',
            'salary_amount' => 'required|numeric|min:2',
            'description' => 'required|string|max:10000|min:50',
            'requirement' => 'required|string|max:10000|min:50',
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
            return back()->with('failed', 'يوجد خطأ ما.');
        }
        return redirect()->route('job.index')->with('success','تم إضافة العمل بنجاح');
    }

    public function edit(Job $job)
    {
        $regions = Region::all();
        $categories = Category::all();

        return view('front.employer.job.edit', compact('job', 'regions', 'categories'));
    }

    public function update(Request $request, Job $job)
    {
        $employer_id = auth()->guard('employer')->id();
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'jobType' => 'required|in:1,2,3',
            'for' => 'required|in:1,2',
            'salary_type' => 'required|in:1,2',
            'salary_amount' => 'required|numeric|min:2',
            'description' => 'required|string|max:10000|min:50',
            'requirement' => 'required|string|max:10000|min:50',
            'last_date' => 'required|date|after_or_equal:today',
        ]);

            $job->update([
                'employer_id' => $employer_id,
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
        return redirect()->route('job.index')->with('success','تم التعديل بنجاح');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('delete', 'تم الحذف بنجاح');
    }



    public function attempts (Job $job)
    {
        $applications  = Application::where('applicationable_id',$job->id)->where('applicationable_type',$job->getMorphClass())->get();
      return view('front.employer.job.attempt',compact('applications'));
    }
}

