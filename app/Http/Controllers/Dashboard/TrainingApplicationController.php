<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Training;
use App\Application;
use Illuminate\Http\Request;

class TrainingApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_applications,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_applications,guard:admin'])->only('index');
        $this->middleware(['permission:update_applications,guard:admin'])->only(['edit', 'update']);
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
        $applications = Application::trainings()->where(function ($query) use ($request) {
            $query->when($request->training, function ($q) use ($request) {
                return $q->where('applicationable_id', $request->job)
                    ->where('applicationable_type', 'App/Training');
            });
            $query->when($request->jobSeeker, function ($q) use ($request) {
                return $q->where('job_seeker_id', $request->jobSeeker);
            });
        })->latest()->paginate(10);

        $trainings = Training::all();
        $jobSeekers = JobSeeker::verified()->get();

        return view('dashboard.trainingApplications.index', compact('applications', 'trainings', 'jobSeekers'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'training' => 'required|exists:trainings,id',
            'jobseeker' => 'required|exists:job_seekers,id'
        ]);

        try {
            $application = new Application;
            $application->job_seeker_id = $attributes['jobseeker'];

            Training::find($attributes['training'])->applications()->save($application);

            session()->flash('success', 'تم تقديم الطلب بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.trainingApplications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        return redirect()->route('dashboard.trainingApplications.index');
    }
}
