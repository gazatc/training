<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\Inquire;
use App\JobSeeker;
use App\Training;
use Illuminate\Http\Request;

class TrainingInquireController extends Controller
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
        $inquires = Inquire::trainings()->where('job_seeker_id', auth()->guard('jobSeeker')->id())
            ->latest()->get();

        return view('front.jobseeker.training.my-inquire', compact('inquires'));
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
    public function store(Request $request, Training $training)
    {
//        dd($training->getMorphClass());
        $request->validate([
            'message' => 'required|max:1000'
        ]);
        if (auth()->guard('jobSeeker')->check()) {
            $jobSeeker = auth()->guard('jobSeeker')->user();
        } else {
            return back()->with('field', 'الاستفسار مسموح لاصحاب الباحثين عن عمل او تدريب');
        }
        Inquire::create([
            'job_seeker_id' => $jobSeeker->id,
            'message' => $request->message,
            'reply' => NULL,
            'inquirable_id' => $training->id,
            'inquirable_type' => $training->getMorphClass(),
            'created_at' => now(),
            'updated_at' => NULL,
        ]);
        return back()->with('success-message', 'تم ارسال رسالة الاستفسار بنجاح');

    }

    //show inquire for this train
    public function show(Training $training)
    {
        $inquires = Inquire::where('job_seeker_id', auth()->guard('jobSeeker')->id())
            ->where('inquirable_id', $training->id)
            ->where('inquirable_type', $training->getMorphClass())->get();
        return view('front.jobseeker.training.my-inquire', compact('inquires'));
    }

    public function inquire_to_this_training(Training $training)
    {
        $inquires = Inquire::where('inquirable_id', $training->id)
            ->where('inquirable_type', $training->getMorphClass())->get();
        return view('front.employer.train.inquire', compact('inquires'));
    }

    public function reply_to_this_inquire(Inquire $inquire)
    {
        return view('front.employer.train.reply_to_inquire', compact('inquire'));

    }

    public function submit_reply_to_this_inquire(Request $request, Inquire $inquire)
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
        return redirect()->route('dashboard.trainingInquires.index');
    }
}
