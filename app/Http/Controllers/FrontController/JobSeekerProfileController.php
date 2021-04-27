<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobSeekerProfileController extends Controller
{
    //

    public function index()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.index',compact('jobSeeker'));
    }

}
