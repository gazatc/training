<?php

namespace App\Http\Controllers\FrontController;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    //
    public function index()
    {
       $employer = auth()->guard('employer')->user();
       return view('front.employer.profile.index',compact('employer'));
    }

    public function edit()
    {
        $regions = Region::all();
        $categories = Category::all();
        $employer = auth()->guard('employer')->user();
        return view('front.employer.profile.edit',compact('employer','regions','categories'));
    }

    public function update(Request $request,Employer $employer)
    {
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

            if ($request->avatar) {
                $attributes['avatar'] = $request->avatar->store('employer_avatars');
                $employer->information()->update([
                    'avatar' => @$attributes['avatar'] ?? NULL,
                ]);
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
                'bio' => $attributes['bio'],
                'phone' => $attributes['phone'],
                'type' => $attributes['type'],
                'year' => $attributes['year'],
                'address' => $attributes['address'],
            ]);

            if(@$employer->socials == null){

                $employer->socials()->insert([
                    'employer_id' =>$employer->id,
                    'web' => $attributes['web'] ?? NULL,
                    'linkedin' => $attributes['linkedin'] ?? NULL,
                    'facebook' => $attributes['facebook'] ?? NULL,
                    'twitter' => $attributes['twitter'] ?? NULL,
                    'instagram' => $attributes['instagram'] ?? NULL,
                    'whatsapp' => $attributes['whatsapp'] ?? NULL,
                ]);
            }else{
            $employer->socials()->update([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
            ]);
            }
        return redirect()->route('employer.profile.index')->with('success','تم تعديل البيانات بنجاح');
    }
}
