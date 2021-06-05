<?php

namespace App\Http\Controllers\FrontController;

use App\JobSeeker;
use App\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamMemberController extends Controller
{
    //

    public function create()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.teams.member.create', compact('jobSeeker'));
    }

    public function store(Request $request)
    {
        $team = auth()->guard('jobSeeker')->user()->team->first();

        $jobSeeker = JobSeeker::where('username', $request->user)->orWhere('email', $request->user)->first();
        if (empty($jobSeeker)) {
            return back()->with('fail', 'لا يوجد تطابق بالمعلومات');
        } else {
            if ($jobSeeker->team->first() == null) {
                TeamMember::create([
                    'team_id' => $team->id,
                    'job_seeker_id' => $jobSeeker->id,
                ]);
                return back()->with('success', 'تم إضافة العضو بنجاح');
            } else {
                return back()->with('fail', 'المستخدم موجود في فريق سابق');
            }
        }
    }

    public function destroy($username = null)
    {
        $jobSeeker = JobSeeker::where('username', $username)->first();
        if($jobSeeker->username == auth()->guard('jobSeeker')->user()->username){
            $TeamMember = TeamMember::where('job_seeker_id', $jobSeeker->id)->delete();
            return back()->with('success', 'تمت مغادرة الفريق بنجاح.');

        }
        $TeamMember = TeamMember::where('job_seeker_id', $jobSeeker->id)->delete();

        return back()->with('success', 'تم حذف العضو بنجاح');

    }
}
