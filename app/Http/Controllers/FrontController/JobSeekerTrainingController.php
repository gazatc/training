<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeekerTraining;
use Illuminate\Http\Request;

class JobSeekerTrainingController extends Controller
{
    //
    public function create()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.training.create',compact('jobSeeker'));
    }

    public function store(Request $request)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        $request->validate([
            'institution' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'from' => 'required|date',
            'to' => 'required|date',
        ]);

        JobSeekerTraining::create([
            'job_seeker_id'=> $jobSeeker->id,
            'name'=> $request->name,
            'institution'=>$request->institution ,
            'from'=>$request->from ,
            'to'=>$request->to ,
            'created_at'=>now() ,
            'updated_at'=>now() ,
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success','تم اضافة سلسلة تدريب بنجاح');
    }

    public function edit($id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        $jobSeekerTraining = JobSeekerTraining::find($id);
        return view('front.jobseeker.profile.training.edit', compact('jobSeekerTraining','jobSeeker'));
    }

    public function update(Request $request, $id = null)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();

        $request->validate([
            'institution' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'from' => 'required|date',
            'to' => 'required|date',
        ]);

        JobSeekerTraining::where('id',$id)->update([
            'job_seeker_id' => $jobSeeker->id,
            'name' => $request->name,
            'institution' => $request->institution,
            'from' => $request->from,
            'to' => $request->to,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('jobSeeker.profile.index')->with('success', 'تم تحديث سلسلة التدريب بنجاح');

    }

    public function destroy($id = null)
    {
        $JobSeekerTraining =  JobSeekerTraining::find($id);
        $JobSeekerTraining->delete();
        return back()->with('success','تم حذف سلسلة التدريب بنجاح');
    }
}
