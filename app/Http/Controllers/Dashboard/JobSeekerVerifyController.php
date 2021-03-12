<?php

namespace App\Http\Controllers\Dashboard;

use App\Employer;
use App\Http\Controllers\Controller;
use App\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerVerifyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:verify_jobSeekers,guard:admin']);
    }

    public function verifyTrigger(JobSeeker $jobSeeker)
    {
        try {
            $jobSeeker->update([
                'verified' => !$jobSeeker->verified
            ]);

            session()->flash('success', 'تم تعديل توثيق الباحث عن عمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobSeekers.index');
    }

    protected function showVerifyForm(JobSeeker $jobSeeker)
    {
        return view('dashboard.jobSeekers.verify', compact('jobSeeker'));

    }
    public function verifyAccount(Request $request, JobSeeker $jobSeeker) {
        $attributes = $request->validate([
            'PID' => 'required|unique:job_seeker_verifies',
            'PID_image' => 'required|file',
            'PID_user_image' => 'required|file',
        ]);
        try {
            $attributes['PID_image'] = $request->PID_image->store('jobseeker_verify');
            $attributes['PID_user_image'] = $request->PID_user_image->store('jobseeker_verify');
            $jobSeeker->verify()->updateOrCreate($attributes);

            session()->flash('success', 'تم اضافة الوثائق الخاصة بتوثيق الباحث عن عمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobSeekers.index');
    }
}
