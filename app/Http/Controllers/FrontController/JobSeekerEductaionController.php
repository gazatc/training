<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeekerEducation;
use Illuminate\Http\Request;

class JobSeekerEductaionController extends Controller
{
    //
    public function create()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.education.create', compact('jobSeeker'));
    }

    public function store(Request $request)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        JobSeekerEducation::create([
            'job_seeker_id' => $jobSeeker->id,
            'institution' => $request->institution,
            'degree' => $request->degree,
            'from' => $request->from,
            'to' => $request->to,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success', 'تم اضافة سلسلة تعليمية بنجاح');
    }

    public function edit($id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        $jobseekerEductaion = JobSeekerEducation::find($id);
        return view('front.jobseeker.profile.education.edit', compact('jobseekerEductaion','jobSeeker'));
    }

    public function update(Request $request, $id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        JobSeekerEducation::where('id',$id)->update([
            'job_seeker_id' => $jobSeeker->id,
            'institution' => $request->institution,
            'degree' => $request->degree,
            'from' => $request->from,
            'to' => $request->to,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success', 'تم تحديث سلسلة تعليمية بنجاح');

    }

    public function destroy($id = null)
    {
        $jobSeekerEducation = JobSeekerEducation::find($id);
        $jobSeekerEducation->delete();
        return back()->with('success', 'تم حذف سلسلة التعليم بنجاح');
    }
}
