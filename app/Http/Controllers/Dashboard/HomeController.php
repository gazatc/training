<?php

namespace App\Http\Controllers\Dashboard;

use App\Actor;
use App\Admin;
use App\Category;
use App\Film;
use App\Http\Controllers\Controller;
use App\Message;
use App\Rating;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $admins = Admin::count();

        return view('dashboard.home', compact('admins'));
    }
}
