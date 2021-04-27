<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeekerEducation;
use App\JobSeekerExperience;
use Illuminate\Http\Request;

class JobSeekerExperienceController extends Controller
{
    //
    public function create()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.experience.create',compact('jobSeeker'));
    }

    public function store(Request $request)
    {


        $jobSeeker = auth()->guard('jobSeeker')->user();
        JobSeekerExperience::create([
            'job_seeker_id'=> $jobSeeker->id,
            'name'=> $request->name,
            'company'=>$request->company ,
            'from'=>$request->from ,
            'to'=>$request->to ,
            'created_at'=>now() ,
            'updated_at'=>now() ,
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success','تم اضافة سلسلة خبرة بنجاح');
    }

    public function edit($id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        $jobSeekerExperience = JobSeekerExperience::find($id);
        return view('front.jobseeker.profile.experience.edit', compact('jobSeekerExperience','jobSeeker'));
    }

    public function update(Request $request, $id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        JobSeekerExperience::where('id',$id)->update([
            'job_seeker_id' => $jobSeeker->id,
            'name' => $request->name,
            'company' => $request->company,
            'from' => $request->from,
            'to' => $request->to,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success', 'تم تحديث سلسلة الخبرة بنجاح');

    }


    public function destroy($id = null)
    {
        $JobSeekerExperience =  JobSeekerExperience::find($id);
        $JobSeekerExperience->delete();
        return back()->with('success','تم حذف سلسلة الخبرة بنجاح');
    }
}
