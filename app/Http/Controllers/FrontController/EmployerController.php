<?php

namespace App\Http\Controllers\FrontController;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    //
    public function show(Employer $employer)
    {
        return view('front.employer-single',compact('employer'));
    }
}
