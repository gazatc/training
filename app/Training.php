<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //
    protected $fillable = ['employer_id', 'category_id' , 'region_id', 'title', 'description',
        'requirement', 'last_date'];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function region() {
        return $this->belongsTo(Region::class);
    }
    public function applications()
    {
        return $this->morphMany(Application::class, 'applicationable');
    }

    public function hasAttemptToThisTraining(JobSeeker $jobSeeker = null)
    {
        $result = $this->applications()->where('job_seeker_id', @$jobSeeker->id)->exists();
        return $result;
    }

    public function numberOFInquire(JobSeeker $jobSeeker)
    {

//        $count = $this->where('job_seeker_id',$jobSeeker->id)->count();
        $count = Inquire::where('job_seeker_id',$jobSeeker->id)->where('inquirable_id',$this->id)->where('inquirable_type',$this->getMorphClass())->count();
        return $count ;
    }

    public function numberOfAttemptsToThisTraining()
    {
        $count = Application::where('applicationable_id',$this->id)->where('applicationable_type',$this->getMorphClass())->count();
        return $count;
    }

    public function numberOFInquireToThisTraining()
    {
        $count = Inquire::where('inquirable_id',$this->id)->where('inquirable_type',$this->getMorphClass())->count();
        return $count;
    }

}
