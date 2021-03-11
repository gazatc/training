<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerEducation extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'institution', 'degree', 'from', 'to'];
}
