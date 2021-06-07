<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use App\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    //

    public function show(JobSeeker $jobSeeker)
    {
//        dd($jobSeeker->team()->first()->members);
        return view('front.jobseeker-single',compact('jobSeeker'));
    }


}
