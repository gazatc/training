<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Training;
use App\Application;
use Illuminate\Http\Request;

class TrainingApplicationController extends Controller
{


    public function index()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        $applications = Application::trainings()->where('job_seeker_id', $jobSeeker->id)->latest()->get();
        return view('front.jobseeker.training.index', compact('applications', 'jobSeeker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $trainings = Training::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.trainingApplications.create', compact('trainings', 'jobSeekers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Training $training)
    {

        if (auth()->guard('jobSeeker')->id() == null) {
            return back();
        }

        if(auth()->guard('jobSeeker')->user()->verified == 0){
            return back()->with('field', 'الرجاء توثيق الحساب حتى تتمكن للتقدم الى التدريب');
        }

        $application = new Application;
        $application->job_seeker_id = auth()->guard('jobSeeker')->id();
        $training->applications()->save($application);

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
