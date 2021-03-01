<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerVerify extends Model
{
    //
    protected $fillable = ['employer_id', 'PID', 'PID_image', 'document'];
}
