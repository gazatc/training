<?php

namespace App\Http\Controllers\Dashboard;

use App\Employer;
use App\Http\Controllers\Controller;
use App\EmployerVerify;
use App\JobSeeker;
use App\JobSeekerVerify;
use Illuminate\Http\Request;

class VerifyAccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:read_verifyAccounts,guard:admin'])->only(['employersApplication', 'jobSeekersApplication']);
        $this->middleware(['permission:verify_verifyAccounts,guard:admin'])->only(['verifyEmployer', 'verifyJobSeeker']);
        $this->middleware(['permission:delete_verifyAccounts,guard:admin'])->only(['deleteEmployerVerify', 'deleteJobSeekerVerify']);
    }

    public function employersApplication(Request $request) {
        $employers = Employer::notVerified()->whereHas('verify')
            ->where(function ($query) use ($request) {
                $query->when($request->search, function ($q) use ($request) {
                    return $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('username', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })->with(['verify', 'information'])->paginate(10);

        return view('dashboard.verifyAccounts.employers', compact('employers'));
    }
    public function verifyEmployer(Employer $employer) {
        try {
            $employer->update([
                'verified' => 1
            ]);

            session()->flash('success', 'تم توثيق صاحب العمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.verifyAccounts.employersApplication');
    }
    public function deleteEmployerVerify(EmployerVerify $employer) {
        try {
            $result = $employer->delete();

            if ($result) {
                session()->flash('success', 'تم حذف الطلب بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف الطلب, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.verifyAccounts.employersApplication');
    }

    public function jobSeekersApplication(Request $request) {
        $jobSeekers = JobSeeker::notVerified()->whereHas('verify')
            ->where(function ($query) use ($request) {
                $query->when($request->search, function ($q) use ($request) {
                    return $q->where('firstName', 'like', '%' . $request->search . '%')
                        ->orWhere('lastName', 'like', '%' . $request->search . '%')
                        ->orWhere('username', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })->with(['verify', 'information'])->paginate(10);

        return view('dashboard.verifyAccounts.jobSeekers', compact('jobSeekers'));
    }
    public function verifyJobSeeker(JobSeeker $jobSeeker) {
        try {
            $jobSeeker->update([
                'verified' => 1
            ]);

            session()->flash('success', 'تم توثيق الباحث عن عمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.verifyAccounts.jobSeekersApplication');
    }
    public function deleteJobSeekerVerify(JobSeekerVerify $jobSeeker) {
        try {
            $result = $jobSeeker->delete();

            if ($result) {
                session()->flash('success', 'تم حذف الطلب بنجاح');
            } else {
                session()->flash('fail', 'خطأ في عملية حذف الطلب, الرجاء المحاولة مرة أخرى!');
            }
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.verifyAccounts.jobSeekersApplication');
    }
}
