<?php

namespace App\Http\Controllers\FrontController;

use App\Application;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        $applications = Application::jobs()->where('job_seeker_id', $jobSeeker->id)->latest()->get();
        return view('front.jobseeker.job.index', compact('applications', 'jobSeeker'));
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
        if (auth()->guard('jobSeeker')->id() == null) {
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
    public function destroy($id = null)
    {
        $application = Application::find($id);
        if ($application->job_seeker_id == auth()->guard('jobSeeker')->id()) {
            $application->delete();
        } else {
            return back()->with('fail', 'حذث خطا ما');
        }
        return back()->with('success', 'تم الحذف بنجاح');
    }
}
