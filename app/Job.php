<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['employer_id', 'category_id', 'region_id', 'title', 'jobType', 'description',
        'requirement', 'last_date', 'salary_type', 'salary_amount', 'for'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function applications()
    {
        return $this->morphMany(Application::class, 'applicationable');
    }

    public function getJobTypeTextAttribute()
    {
        switch ($this->jobType) {
            case 1 :
                return "دوام كامل";
                break;
            case 2 :
                return "دوام جزئي";
                break;
            case 3 :
                return "عن بعد";
                break;
        }
    }

    public function getForTextAttribute()
    {
        switch ($this->for) {
            case 1 :
                return "أشخاص";
                break;
            case 2 :
                return "فرق";
                break;
        }
    }

    public function getSalaryTypeTextAttribute()
    {
        switch ($this->salary_type) {
            case 1 :
                return "ثابت";
                break;
            case 2 :
                return "بالساعة";
                break;
        }
    }

    public function hasAttemptToThisJob(JobSeeker $jobSeeker = null)
    {
        $result = $this->applications()->where('job_seeker_id', @$jobSeeker->id)->exists();
        return $result;
    }

    public function numberOFInquire(JobSeeker $jobSeeker)
    {
        $count = Inquire::where('job_seeker_id',$jobSeeker->id)->where('inquirable_id',$this->id)->where('inquirable_type',$this->getMorphClass())->count();
        return $count ;
    }

    public function numberOfAttemptsToThisJob()
    {
        $count = Application::where('applicationable_id',$this->id)->where('applicationable_type',$this->getMorphClass())->count();
        return $count;
    }

    public function numberOFInquireToThisJob()
    {
        $count = Inquire::where('inquirable_id',$this->id)->where('inquirable_type',$this->getMorphClass())->count();
        return $count;
    }

}
