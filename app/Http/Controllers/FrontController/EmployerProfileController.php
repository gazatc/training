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
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'type' => 'required|string|max:30',
            'year' => 'required|max:4',
            'address' => 'required|string|max:50',
            'bio' => 'required|string|max:10000|min:150',
            'web' => 'nullable|url|max:70',
            'linkedin' => 'nullable|url|max:70|regex:/http(s)?:\/\/(www\.)?linkedin\.com\/.+/i',
            'facebook' => 'nullable|url|max:70|regex:/http(s)?:\/\/(www\.)?facebook\.com\/.+/i',
            'twitter' => 'nullable|url|max:70|regex:/http(s)?:\/\/(www\.)?twitter\.com\/.+/i',
            'instagram' => 'nullable|url|max:70|regex:/http(s)?:\/\/(www\.)?instagram\.com\/.+/i',
            'whatsapp' => 'nullable|url|max:70',
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

    public function formVerify()
    {
        $employer = auth()->guard('employer')->user();
        return view('front.employer.verify.create',compact('employer'));
    }

    public function storeVerify(Request $request ,Employer $employer)
    {
        $attributes = $request->validate([
            'PID' => 'required|unique:employer_verifies',
            'PID_image' => 'required|file',
            'PID_user_image' => 'required|file',
            'document' => 'required|file',
        ]);
            $attributes['PID_image'] = $request->PID_image->store('employer_verify');
            $attributes['PID_user_image'] = $request->PID_user_image->store('employer_verify');
            $attributes['document'] = $request->document->store('employer_verify');
            $employer->verify()->updateOrCreate($attributes);

        $employer->update(['verified' => 0]);
        return redirect()->route('employer.profile.index')->with('success', 'تم رفع البيانات بنجاح');
    }
}
