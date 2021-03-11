<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerTraining extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'name', 'institution', 'from', 'to'];
}
