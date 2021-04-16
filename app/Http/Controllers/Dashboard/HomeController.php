<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Admin;
use App\Application;
use App\Category;
use App\Employer;
use App\EmployerVerify;
use App\Film;
use App\Http\Controllers\Controller;
use App\Inquire;
use App\Job;
use App\JobSeeker;
use App\JobSeekerVerify;
use App\Message;
use App\Rating;
use App\Region;
use App\Review;
use App\Role;
use App\Team;
use App\Training;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $admins = Admin::count();
        $roles = Role::count();
        $categories = Category::count();
        $regions = Region::count();
        $employers = Employer::count();
        $jobSeekers = JobSeeker::count();
        $jobs = Job::count();
        $trainings = Training::count();
        $teams = Team::count();
        $applications = Application::count();
        $inquires = Inquire::count();
        $messages = Message::count();

        return view('dashboard.home',
            compact('admins', 'roles', 'categories', 'regions', 'employers', 'jobSeekers', 'jobs', 'trainings', 'teams', 'applications', 'inquires', 'messages'));
    }
}
