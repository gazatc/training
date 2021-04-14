<?php

namespace App\Http\Controllers\Dashboard;

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
        $inquires = Inquire::trainings()->where(function ($query) use ($request) {
            $query->when($request->training, function ($q) use ($request) {
                return $q->where('inquirable_id', $request->training)
                    ->where('inquirable_type', 'App\Training');
            });
            $query->when($request->jobSeeker, function ($q) use ($request) {
                return $q->where('job_seeker_id', $request->jobSeeker);
            });
        })->latest()->paginate(10);

        $trainings = Training::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.trainingInquires.index', compact('inquires', 'trainings', 'jobSeekers'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function show(Inquire $inquire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquire $inquire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inquire  $inquire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquire $inquire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inquire  $inquire
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
