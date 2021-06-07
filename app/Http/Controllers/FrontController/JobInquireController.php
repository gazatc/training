<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Inquire;
use App\Job;
use App\JobSeeker;
use Illuminate\Http\Request;

class JobInquireController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $inquires = Inquire::jobs()->where(function ($query) use ($request) {
            $query->when($request->job, function ($q) use ($request) {
                return $q->where('inquirable_id', $request->job)
                    ->where('inquirable_type', 'App\Job');
            });
            $query->when($request->jobSeeker, function ($q) use ($request) {
                return $q->where('job_seeker_id', $request->jobSeeker);
            });
        })->latest()->paginate(10);

        $jobs = Job::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.jobInquires.index', compact('inquires', 'jobs', 'jobSeekers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Job $job)
    {
//        dd($job->getMorphClass());
//        id	job_seeker_id	message	reply	inquirable_id	inquirable_type	created_at	updated_at
//        dd($request->all());
        $request->validate([
            'message' => 'required'
        ]);
        if(auth()->guard('jobSeeker')->check()){
        $jobSeeker = auth()->guard('jobSeeker')->user();
        }else{
            return back()->with('field','الاستفسار مسموح لاصحاب الباحثين عن عمل او تدريب');
        }
        Inquire::create([
            'job_seeker_id' => $jobSeeker->id,
            'message' => $request->message,
            'reply' => NULL,
            'inquirable_id' => $job->id,
            'inquirable_type' => $job->getMorphClass(),
            'created_at' => now(),
            'updated_at' => NULL,
        ]);
        return back()->with('success-message', 'تم ارسال رسالة الاستفسار بنجاح');
    }

    //show inquire for this job
    public function show(Job $job)
    {
        $inquires = Inquire::where('job_seeker_id',auth()->guard('jobSeeker')->id())
            ->where('inquirable_id',$job->id)
            ->where('inquirable_type',$job->getMorphClass())->get();
        return view('front.jobseeker.job.my-inquire',compact('inquires'));
    }


    //show all inquire for this job from employer interface
    public function inquire_to_this_job(Job $job)
    {
        $inquires = Inquire::where('inquirable_id',$job->id)
            ->where('inquirable_type',$job->getMorphClass())->get();
        return view('front.employer.job.inquire',compact('inquires'));
    }

    public function reply_to_this_inquire(Inquire $inquire)
    {

        return view('front.employer.job.reply_to_inquire',compact('inquire'));
    }

    public function submit_reply_to_this_inquire(Request $request,Inquire $inquire)
    {
            $request->validate([
                'reply'=>'required'
            ]);
        $inquire->update([
            'reply'=>$request->reply,
            'updated_at'=>now()
        ]);
        return back()->with('success','تم الرد بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Inquire $inquire
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquire $inquire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Inquire $inquire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquire $inquire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Inquire $inquire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquire $inquire)
    {
        //
        try {
            $result = $inquire->delete();

            if ($result) {
                session()->flash('success', 'تم حذف الاستفسار بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف الاستفسار, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobInquires.index');
    }


}
