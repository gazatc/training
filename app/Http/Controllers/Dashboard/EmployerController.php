<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_employers,guard:admin'])->only(['create', 'store']);
        $this->middleware(['permission:read_employers,guard:admin'])->only('index');
        $this->middleware(['permission:show_employers,guard:admin'])->only('show');
        $this->middleware(['permission:update_employers,guard:admin'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_employers,guard:admin'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $employers = Employer::with(['information', 'verify'])->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('username', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('information', function ($query) use ($request) {
                        $query->where('phone', 'like', '%' . $request->search . '%')
                            ->orWhere('address', 'like', '%' . $request->search . '%');
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

        return view('dashboard.employers.index', compact('employers', 'regions', 'categories'));
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

        return view('dashboard.employers.create', compact('categories', 'regions'));
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:employers',
            'password' => 'required|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|string|max:20',
            'type' => 'required|string|max:30',
            'year' => 'required|max:4',
            'address' => 'required|string|max:50',
            'bio' => 'required|string|max:150',
            'web' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'instagram' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
        ]);
        try {
            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('employer_avatars');
            }

            $employer = Employer::create([
                'username' => $attributes['username'],
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'password' => bcrypt($attributes['password'])
            ]);
            $employer->information()->create([
                'region_id' => $attributes['region'],
                'category_id' => $attributes['category'],
                'avatar' => $attributes['avatar'] ?? NULL,
                'bio' => $attributes['bio'],
                'phone' => $attributes['phone'],
                'type' => $attributes['type'],
                'year' => $attributes['year'],
                'address' => $attributes['address'],
            ]);
            $employer->socials()->create([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
            ]);

            session()->flash('success', 'تم اضافة صاحب العمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.employers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
        return view('dashboard.employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        //
        $categories = Category::all();
        $regions = Region::all();

        return view('dashboard.employers.edit', compact('employer', 'categories', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        //
        $attributes = $request->validate([
            'username' => 'required|string|unique:employers,email,' . $employer->id,
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:employers,email,' . $employer->id,
            'password' => 'nullable|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|string|max:20',
            'type' => 'required|string|max:30',
            'year' => 'required|max:4',
            'address' => 'required|string|max:50',
            'bio' => 'required|string|max:150',
            'web' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'instagram' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
        ]);
        try {
            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('employer_avatars');
            }

            $employer->update([
                'username' => $attributes['username'],
                'name' => $attributes['name'],
                'email' => $attributes['email'],
            ]);
            if ($request->password) {
                $employer->update([
                    'password' => bcrypt($attributes['password'])
                ]);
            }
            $employer->information()->update([
                'region_id' => $attributes['region'],
                'category_id' => $attributes['category'],
                'avatar' => $attributes['avatar'] ?? NULL,
                'bio' => $attributes['bio'],
                'phone' => $attributes['phone'],
                'type' => $attributes['type'],
                'year' => $attributes['year'],
                'address' => $attributes['address'],
            ]);
            $employer->socials()->update([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
            ]);

            session()->flash('success', 'تم تعديل بيانات صاحب العمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.employers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employer $employer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Employer $employer)
    {
        //
        try {
            $avatar = $employer->information->getAttributes()['avatar'];

            $result = $employer->delete();

            if ($result) {
                if (isset($avatar) && $avatar) {
                    Storage::delete($avatar);
                }
                session()->flash('success', 'تم حذف صاحب العمل بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف صاحب العمل, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.employers.index');
    }
}
