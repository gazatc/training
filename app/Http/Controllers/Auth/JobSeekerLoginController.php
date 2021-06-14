<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class JobSeekerLoginController extends DefaultLoginController
{

    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard('jobSeeker');
    }


    public function login_form()
    {
        return view('front.jobseeker.auth.login');
    }

    public function register_form()
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('front.jobseeker.auth.register', compact('regions', 'categories'));
    }

    public function register_post(Request $request)
    {
//      dd($request->all());
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
            'age' => 'required|integer|between:15,80',
            'degree' => 'required|string|max:50',
            'bio' => 'required|string|max:10000|min:150',
            'skills' => 'required|string|max:10000|min:50',
        ]);
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
        Auth::guard('jobSeeker')->login($jobSeeker);
        return redirect('/');
    }

    public function logout_jobSeeker()
    {
        Auth::guard('jobSeeker')->logout();
        return redirect(route('jobSeeker.login_form'));
    }
}
