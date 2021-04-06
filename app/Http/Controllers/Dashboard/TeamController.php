<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_teams,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_teams,guard:admin'])->only('index');
        $this->middleware(['permission:update_teams,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_teams,guard:admin'])->only('destroy');
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
        $teams = Team::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%');
            });
            $query->when($request->jobSeeker, function ($q2) use ($request) {
                return $q2->where('leader_id', $request->jobSeeker)
                    ->OrWhereHas('members', function ($q4) use ($request) {
                        $q4->where('job_seeker_id', $request->jobSeeker);
                    });
            });
        })->latest()->paginate(10);
        $jobSeekers = JobSeeker::where('verified', 1)->has('team')->orHas('teamLeader')->get();

        return view('dashboard.teams.index', compact('teams', 'jobSeekers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jobSeekers = JobSeeker::where('verified', 1)->doesntHave('team')->orDoesntHave('teamLeader', 'or')->get();
        return view('dashboard.teams.create', compact('jobSeekers'));
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
            'team_leader' => 'required|exists:job_seekers,id',
            'members' => 'required|array',
            'members.*.id' => ['required', 'exists:job_seekers,id', Rule::notIn($request->team_leader),]
        ]);

        try {
            $team = Team::create([
                'name' => $attributes['name'],
                'bio' => $attributes['bio'],
                'leader_id' => $attributes['team_leader'],
            ]);
            $team->members()
                ->sync(collect($request->members)->map(function ($v) {
                    return $v['id'];
                })->toArray());

            session()->flash('success', 'تم اضافة الفريق بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.teams.index');
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
        //
        $jobSeekers = JobSeeker::where('verified', 1)->doesntHave('team')->orDoesntHave('teamLeader', 'or')->get();
        return view('dashboard.teams.edit', compact('team', 'jobSeekers'));
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
            'team_leader' => 'required|exists:job_seekers,id',
            'members' => 'required|array',
            'members.*.id' => ['required', 'exists:job_seekers,id', Rule::notIn($request->team_leader),]
        ]);

        try {
            $team->update([
                'name' => $attributes['name'],
                'bio' => $attributes['bio'],
                'leader_id' => $attributes['team_leader'],
            ]);
            $team->members()
                ->sync(collect($request->members)->map(function ($v) {
                    return $v['id'];
                })->toArray());

            session()->flash('success', 'تم تعديل الفريق بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.teams.index');
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
        return redirect()->route('dashboard.teams.index');
    }
}
