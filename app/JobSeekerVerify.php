<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerVerify extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'PID', 'PID_image', 'PID_user_image'];

    public function getPIDImageAttribute($value)
    {
        return asset($value ? 'storage/' . $value : NULL);
    }
    public function getPIDUserImageAttribute($value)
    {
        return asset($value ? 'storage/' . $value : NULL);
    }
}
