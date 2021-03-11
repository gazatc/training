<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerCVController extends Controller
{
    //
    public function showCVForm(JobSeeker $jobSeeker)
    {
        $education = $jobSeeker->education;
        $experience = $jobSeeker->experience;
        $training = $jobSeeker->training;
        return view('dashboard.jobSeekers.cv', compact('jobSeeker', 'education', 'experience', 'training'));
    }

    public function saveCV(JobSeeker $jobSeeker, Request $request)
    {
        $attributes = $request->validate([
            'education' => 'required',
            'education.*.institution' => 'required|string|max:50',
            'education.*.degree' => 'required|string|max:50',
            'education.*.from' => 'required|date',
            'education.*.to' => 'required|date',
            'experience' => 'required',
            'experience.*.name' => 'required|string|max:50',
            'experience.*.company' => 'required|string|max:50',
            'experience.*.from' => 'required|date',
            'experience.*.to' => 'required|date',
            'training' => 'required',
            'training.*.name' => 'required|string|max:50',
            'training.*.institution' => 'required|string|max:50',
            'training.*.from' => 'required|date',
            'training.*.to' => 'required|date',
        ]);

        try {
            $jobSeeker->education()->delete();
            foreach ($request->education as $education) {
                $jobSeeker->education()->create($education);
            }
            $jobSeeker->experience()->delete();
            foreach ($request->experience as $experience) {
                $jobSeeker->experience()->create($experience);
            }
            $jobSeeker->training()->delete();
            foreach ($request->training as $training) {
                $jobSeeker->training()->create($training);
            }

            session()->flash('success', 'تم حفظ بيانات السيرة الذاتية للباحث عن عمل بنجاح');

        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }

        return redirect()->route('dashboard.jobSeekers.index');
    }
}
