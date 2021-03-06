<?php

namespace App\Http\Controllers\Dashboard;

use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerVerifyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:verify_employers,guard:admin']);
    }

    public function verifyTrigger(Employer $employer)
    {
        try {
            $employer->update([
                'verified' => !$employer->verified
            ]);

            session()->flash('success', 'تم تعديل توثيق صاحب العمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.employers.index');
    }

    protected function showVerifyForm(Employer $employer)
    {
        return view('dashboard.employers.verify', compact('employer'));

    }
    public function verifyAccount(Request $request, Employer $employer) {
        $attributes = $request->validate([
            'PID' => 'required|unique:employer_verifies',
            'PID_image' => 'required|file',
            'PID_user_image' => 'required|file',
            'document' => 'required|file',
        ]);
        try {
            $attributes['PID_image'] = $request->PID_image->store('employer_verify');
            $attributes['PID_user_image'] = $request->PID_user_image->store('employer_verify');
            $attributes['document'] = $request->document->store('employer_verify');
            $employer->verify()->updateOrCreate($attributes);

            session()->flash('success', 'تم اضافة الوثائق الخاصة بتوثيق صاحب العمل بنجاح');
        } catch (\Exception $e) {
            session()->flash('fail', $e->getMessage());
        }
        return redirect()->route('dashboard.employers.index');
    }
}
