<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Team;
use App\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $jobSeeker = auth()->guard('jobSeeker')->user();
        $team = $jobSeeker->team()->first();

        return view('front.jobseeker.teams.index',compact('jobSeeker','team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $jobSeekers = JobSeeker::verified()->doesntHave('team')->doesntHave('teamLeader')->get();
        return view('front.jobseeker.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|string|min:2|max:50|unique:teams',
            'bio' => 'required|string|max:350',
        ]);


            $team = Team::create([
                'name' => $attributes['name'],
                'bio' => $attributes['bio'],
                'leader_id' => auth()->guard('jobSeeker')->id(),
            ]);

//           TeamMember::create([
//                'team_id'=>$team->id,
//                'job_seeker_id'=>auth()->guard('jobSeeker')->id(),
//            ]);

            session()->flash('success', 'تم اضافة الفريق بنجاح');

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {

        return view('front.jobseeker.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $attributes = $request->validate([
            'name' => 'required|string|min:2|max:50|unique:teams,name,' . $team->id,
            'bio' => 'required|string|max:350',
        ]);

        try {
            $team->update([
                'name' => $attributes['name'],
                'bio' => $attributes['bio'],
                'leader_id' => auth()->guard('jobSeeker')->id(),
            ]);
            session()->flash('success', 'تم تعديل الفريق بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        try {
            $team->delete();
            session()->flash('success', 'تم حذف الفريق بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('teams.index');
    }
}
