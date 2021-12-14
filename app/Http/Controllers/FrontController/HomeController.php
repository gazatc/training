<?php

namespace App\Http\Controllers\FrontController;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\JobSeeker;
use App\Message;
use App\Training;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function jobs(Request $request)
    {
//        dd($request->all());

        $jobs = Job::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%')
                        ->orWhere('requirement', 'like', '%' . $request->search . '%');
                });
            });
            $query->when($request->target, function ($q2) use ($request) {
                return $q2->whereIn('for', $request->target);
            });
            $query->when($request->type, function ($q2) use ($request) {
                return $q2->whereIn('jobType', $request->type);
            });
            $query->when($request->category, function ($q3) use ($request) {
                return $q3->where('category_id', $request->category);
            });
            $query->when($request->region, function ($q4) use ($request) {
                return $q4->whereIn('region_id', $request->region);
            });
            $query->when($request->employer, function ($q4) use ($request) {
                return $q4->where('employer_id', $request->employer);
            });
        })->orderBy('created_at', 'desc')->paginate(15);
        return view('front.jobs', compact('jobs'));
    }

    public function employers(Request $request)
    {
        $employers = Employer::with(['information', 'verify'])->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('username', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhereHas('information', function ($query) use ($request) {
                        $query->where('phone', 'like', '%' . $request->search . '%')
                            ->orWhere('address', 'like', '%' . $request->search . '%');
                    });
            })->when($request->region, function ($q2) use ($request) {
                return $q2->whereHas('information', function ($q2) use ($request) {
                    $q2->where('region_id', $request->region);
                });
            })->when($request->category, function ($q3) use ($request) {
                return $q3->whereHas('information', function ($q3) use ($request) {
                    $q3->where('category_id', $request->category);
                });
            })->when($request->verified, function ($q4) use ($request) {
                return $q4->where('verified', $request->verified);
            });
        })->latest()->paginate(15);

        return view('front.employers', compact('employers'));
    }

    public function trains(Request $request)
    {
        $trainings = Training::where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where(function ($query) use ($request) {
                    return $query->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%')
                        ->orWhere('requirement', 'like', '%' . $request->search . '%');
                });
            });
            $query->when($request->category, function ($q3) use ($request) {
                return $q3->where('category_id', $request->category);
            });
            $query->when($request->region, function ($q4) use ($request) {
                return $q4->whereIn('region_id', $request->region);
            });
            $query->when($request->employer, function ($q4) use ($request) {
                return $q4->where('employer_id', $request->employer);
            });
        })->orderBy('created_at', 'desc')->paginate(15);
        return view('front.train', compact('trainings'));
    }

    public function jobSeekers(Request $request)
    {
        $jobSeekers = JobSeeker::with(['information', 'verify'])->where(function ($query) use ($request) {
            $query->when($request->search, function ($q) use ($request) {
                return $q->where(function ($query) use ($request) {
                    return $query->where('username', 'like', '%' . $request->search . '%')
                        ->orWhere('firstName', 'like', '%' . $request->search . '%')
                        ->orWhere('lastName', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%')
                        ->orWhereHas('information', function ($query) use ($request) {
                            $query->where('phone', 'like', '%' . $request->search . '%')
                                ->orWhere('age', 'like', '%' . $request->search . '%');
                        });
                });
            })->when($request->region, function ($q2) use ($request) {
                return $q2->whereHas('information', function ($q2) use ($request) {
                    $q2->where('region_id', $request->region);
                });
            })->when($request->category, function ($q3) use ($request) {
                return $q3->whereHas('information', function ($q3) use ($request) {
                    $q3->where('category_id', $request->category);
                });
            })->when($request->verified, function ($q4) use ($request) {
                return $q4->where('verified', $request->verified);
            });
        })->latest()->paginate(15);
        return view('front.jobSeekers', compact('jobSeekers'));
    }

    function contactForm()
    {
        return view('front.contact');
    }

    function contactSend(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string|max:250'
        ]);

        Message::create([
            'email' => $attributes['email'],
            'title' => $attributes['title'],
            'message' => $attributes['message'],
        ]);

        session()->flash('success', 'تم ارسال رسالتك, شكرا لك');
        return redirect()->back();
    }

}
