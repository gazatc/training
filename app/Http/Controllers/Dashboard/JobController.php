<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\Region;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_jobs,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_jobs,guard:admin'])->only('index');
        $this->middleware(['permission:show_jobs,guard:admin'])->only('show');
        $this->middleware(['permission:update_jobs,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_jobs,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //
        $jobs = Job::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%')
                    ->orWhere('requirement', 'like', '%' . $request->search . '%');
            })->when($request->type, function ($q2) use ($request) {
                $q2->where('jobType', $request->type);
            })->when($request->salary_type, function ($q2) use ($request) {
                $q2->where('salary_type', $request->salary_type);
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
        $employers = Employer::verified()->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.jobs.index', compact('jobs', 'employers', 'regions', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employers = $employers = Employer::verified()->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.jobs.create', compact('employers', 'regions', 'categories'));
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
            'title' => 'required|string|max:50',
            'employer' => 'required|exists:employers,id',
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
                'employer_id' => $attributes['employer'],
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

            session()->flash('success', 'تم اضافة الوظيفة بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
        return view('dashboard.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
        $employers = $employers = Employer::verified()->get();
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.jobs.edit', compact('job', 'employers', 'regions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'employer' => 'required|exists:employers,id',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'jobType' => 'required|in:1,2,3',
            'for' => 'required|in:1,2',
            'salary_type' => 'required|in:1,2',
            'salary_amount' => 'required|numeric|min:2',
            'description' => 'required|string|max:10000|min:50',
            'requirement' => 'required|string|max:10000|min:50',
            'last_date' => 'required|date|after:' . $job->created_at,
        ]);
        try {
            $job->update([
                'employer_id' => $attributes['employer'],
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

            session()->flash('success', 'تم تعديل الوظيفة بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
        try {
            $job->delete();

            session()->flash('success', 'تم حذف الوظيفة بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobs.index');
    }
}
