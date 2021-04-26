<?php

namespace App\Http\Controllers\FrontController;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobSeeker;
use App\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function jobs()
    {
        $jobs = Job::orderBy('created_at','desc')->paginate(15);
        return view('front.jobs',compact('jobs'));
    }
    public function employers()
    {
        $employers = Employer::inRandomOrder()->get();

        return view('front.employers',compact('employers'));
    }
    public function trains()
    {
        $trainings = Training::orderBy('created_at','desc')->paginate(15);
        return view('front.train',compact('trainings'));
    }
    public function jobSeekers()
    {
        $jobSeekers = JobSeeker::inRandomOrder()->get();
        return view('front.jobSeekers' ,compact('jobSeekers'));
    }


}
