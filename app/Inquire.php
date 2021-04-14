<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'message', 'reply', 'inquirable_id', 'inquirable_type'];

    public function inquirable()
    {
        return $this->morphTo();
    }
    public function jobSeeker() {
        return $this->belongsTo(JobSeeker::class);
    }

    public function scopeJobs($query)
    {
        return $query->where('inquirable_type', 'App\Job');
    }
    public function scopeTrainings($query)
    {
        return $query->where('inquirable_type', 'App\Training');
    }
}
