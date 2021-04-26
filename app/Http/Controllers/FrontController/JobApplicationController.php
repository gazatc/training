<?php

namespace App\Http\Controllers\FrontController;

use App\Application;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobSeeker;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //
        $applications = Application::jobs()->where(function ($query) use ($request) {
            $query->when($request->job, function ($q) use ($request) {
                return $q->where('applicationable_id', $request->job)
                    ->where('applicationable_type', 'App\Job');
            });
            $query->when($request->jobSeeker, function ($q) use ($request) {
                return $q->where('job_seeker_id', $request->jobSeeker);
            });
        })->latest()->paginate(10);

        $jobs = Job::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.jobApplications.index', compact('applications', 'jobs', 'jobSeekers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobs = Job::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.jobApplications.create', compact('jobs', 'jobSeekers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Job $job)
    {
        //
//        $attributes = $request->validate([
//            'job' => 'required|exists:jobs,id',
//            'jobseeker' => 'required|exists:job_seekers,id'
//        ]);
        if(auth()->guard('jobSeeker')->id() == null){
            return back();
        }

        $application = new Application;
        $application->job_seeker_id = auth()->guard('jobSeeker')->id();
        $job->applications()->save($application);

        return back()->with('success', 'تم التقديم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
        try {
            $result = $application->delete();

            if ($result) {
                session()->flash('success', 'تم حذف الطلب بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف الطلب, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobApplications.index');
    }
}
