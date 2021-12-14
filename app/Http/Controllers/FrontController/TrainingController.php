<?php

namespace App\Http\Controllers\FrontController;

use App\Application;
use App\Category;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Job;
use App\Region;
use App\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{

    public function index()
    {
        $employer = auth()->guard('employer')->user();
        $trainings = Training::orderBy('created_at', 'desc')->where('employer_id', $employer->id)->paginate(15);

        return view('front.employer.train.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $regions = Region::all();
        $categories = Category::all();

        return view('front.employer.train.create', compact('regions', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employer $employer)
    {
        //
        if(auth()->guard('employer')->user()->verified == 0){
            return back()->with('failed', 'الرجاء توثيق الحساب حتى تتمكن من اضافة التدريب');
        }

        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:10000|min:50',
            'requirement' => 'required|string|max:10000|min:50',
            'last_date' => 'required|date||after_or_equal:today',
        ]);
        try {
            Training::create([
                'employer_id' => $employer->id,
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
            ]);

        } catch (\Exception $e) {
            return back()->with('failed', 'يوجد خطأ ما.');
        }
        return redirect()->route('training.index')->with('success', 'تم اضافة التدريب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Training $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('front.train-single', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Training $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('front.employer.train.edit', compact('training', 'regions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Training $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $employer_id = auth()->guard('employer')->id();
        if($employer_id == null){
            return back();
        }
        $attributes = $request->validate([
            'title' => 'required|string|max:50',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string|max:10000|min:50',
            'requirement' => 'required|string|max:10000|min:50',
            'last_date' => 'required|date|after:' . $training->created_at,
        ]);

            $training->update([
                'employer_id' => $employer_id,
                'category_id' => $attributes['category'],
                'region_id' => $attributes['region'],
                'title' => $attributes['title'],
                'description' => $attributes['description'],
                'requirement' => $attributes['requirement'],
                'last_date' => $attributes['last_date'],
            ]);

        return redirect()->route('training.index')->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Training $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return back()->with('delete', 'تم الحذف بنجاح');
    }

    public function attempts (Training $training)
    {
        $applications  = Application::where('applicationable_id',$training->id)->where('applicationable_type',$training->getMorphClass())->get();
        return view('front.employer.train.attempt',compact('applications'));
    }
}
