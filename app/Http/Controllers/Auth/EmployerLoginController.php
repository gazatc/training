<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class EmployerLoginController extends DefaultLoginController
{


    public function username()
    {
        return 'email';
    }

    protected function guard()
    {
        return Auth::guard('employer');
    }

    public function login_form()
    {
        return view('front.employer.auth.login');
    }

    public function register_form()
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('front.employer.auth.register', compact('regions', 'categories'));
    }

    public function register_post(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|string|max:50|unique:employers',
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:employers',
            'password' => 'required|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'type' => 'required|string|max:30',
            'year' => 'required|max:4',
            'address' => 'required|string|max:50',
            'bio' => 'required|string|max:10000|min:150',
        ]);


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

        Auth::guard('employer')->login($employer);

        return redirect('/');
    }
    public function logout_employer()
    {
        Auth::guard('employer')->logout();
        return redirect(route('employer.login_form'));
    }
}
