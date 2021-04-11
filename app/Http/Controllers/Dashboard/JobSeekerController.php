<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobSeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_jobSeekers,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_jobSeekers,guard:admin'])->only('index');
        $this->middleware(['permission:show_jobSeekers,guard:admin'])->only('show');
        $this->middleware(['permission:update_jobSeekers,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_jobSeekers,guard:admin'])->only('destroy');
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
        $jobSeekers = JobSeeker::with(['information', 'verify'])->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('username', 'like', '%' . $request->search . '%')
                    ->orWhere('firstName', 'like', '%' . $request->search . '%')
                    ->orWhere('lastName', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('information', function ($query) use ($request) {
                        $query->where('phone', 'like', '%' . $request->search . '%')
                            ->orWhere('age', 'like', '%' . $request->search . '%');
                    });
            })->when($request->region, function ($q2) use ($request) {
                return $q2->whereHas('information', function ($q2) use ($request) {
                    $q2->where('region_id', $request->region);
                });
            })->when($request->category, function ($q3) use ($request) {
                return $q3->whereHas('information', function ($q3) use ($request) {
                    $q3->where('category_id', $request->category);
                });
            })->when($request->verified, function ($q4) use ($request) {
                return $q4->where('verified', $request->verified);
            });
        })->latest()->paginate(10);
        $regions = Region::all();
        $categories = Category::all();

        return view('dashboard.jobSeekers.index', compact('jobSeekers', 'regions', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $regions = Region::all();

        return view('dashboard.jobSeekers.create', compact('categories', 'regions'));
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
            'username' => 'required|string|max:50|unique:employers',
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'email' => 'required|email|unique:employers',
            'password' => 'required|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|string|max:20',
            'age' => 'required|max:3',
            'degree' => 'required|string|max:50',
            'bio' => 'required|string|max:350',
            'skills' => 'required|string|max:350',
            'web' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'instagram' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
            'behance' => 'nullable|url|max:50',
            'github' => 'nullable|url|max:50',
        ]);
        try {
            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('jobSeeker_avatars');
            }

            $jobSeeker = JobSeeker::create([
                'username' => $attributes['username'],
                'firstName' => $attributes['firstName'],
                'lastName' => $attributes['lastName'],
                'email' => $attributes['email'],
                'password' => bcrypt($attributes['password'])
            ]);
            $jobSeeker->information()->create([
                'region_id' => $attributes['region'],
                'category_id' => $attributes['category'],
                'avatar' => $attributes['avatar'] ?? NULL,
                'bio' => $attributes['bio'],
                'skills' => $attributes['skills'],
                'degree' => $attributes['degree'],
                'age' => $attributes['age'],
                'phone' => $attributes['phone'],
            ]);
            $jobSeeker->socials()->create([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
                'behance' => $attributes['behance'] ?? NULL,
                'github' => $attributes['github'] ?? NULL,
            ]);

            session()->flash('success', 'تم اضافة باحث عن عمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobSeekers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobSeeker $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function show(JobSeeker $jobSeeker)
    {
        //
        return view('dashboard.jobSeekers.show', compact('jobSeeker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobSeeker $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSeeker $jobSeeker)
    {
        //
        $categories = Category::all();
        $regions = Region::all();

        return view('dashboard.jobSeekers.edit', compact('jobSeeker', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\JobSeeker $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSeeker $jobSeeker)
    {
        //
        $attributes = $request->validate([
            'username' => 'required|string|max:50|unique:employers,username,' . $jobSeeker->id,
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'email' => 'required|email|unique:employers,email,' . $jobSeeker->id,
            'password' => 'nullable|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|string|max:20',
            'age' => 'required|max:3',
            'degree' => 'required|string|max:50',
            'bio' => 'required|string|max:350',
            'skills' => 'required|string|max:350',
            'web' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'instagram' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
            'behance' => 'nullable|url|max:50',
            'github' => 'nullable|url|max:50',
        ]);
        try {
            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('jobSeeker_avatars');
            }

            $jobSeeker->update([
                'username' => $attributes['username'],
                'firstName' => $attributes['firstName'],
                'lastName' => $attributes['lastName'],
                'email' => $attributes['email']
            ]);
            if ($request->password) {
                $jobSeeker->update([
                    'password' => bcrypt($attributes['password'])
                ]);
            }
            $jobSeeker->information()->update([
                'region_id' => $attributes['region'],
                'category_id' => $attributes['category'],
                'avatar' => $attributes['avatar'] ?? NULL,
                'bio' => $attributes['bio'],
                'skills' => $attributes['skills'],
                'degree' => $attributes['degree'],
                'age' => $attributes['age'],
                'phone' => $attributes['phone'],
            ]);
            $jobSeeker->socials()->update([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
                'behance' => $attributes['behance'] ?? NULL,
                'github' => $attributes['github'] ?? NULL,
            ]);

            session()->flash('success', 'تم تعديل باحث عن عمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobSeekers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobSeeker $jobSeeker
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobSeeker $jobSeeker)
    {
        //
        try {
            $avatar = $jobSeeker->information->getAttributes()['avatar'];

            $result = $jobSeeker->delete();

            if ($result) {
                if (isset($avatar) && $avatar) {
                    Storage::delete($avatar);
                }
                session()->flash('success', 'تم حذف الباحث عن عمل بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف الباحث عن عمل, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.jobSeekers.index');
    }
}
