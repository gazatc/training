<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerVerify extends Model
{
    //
    protected $fillable = ['employer_id', 'PID', 'PID_image', 'PID_user_image', 'document'];

    public function getPIDImageAttribute($value)
    {
        return asset($value ? 'storage/' . $value : NULL);
    }
    public function getPIDUserImageAttribute($value)
    {
        return asset($value ? 'storage/' . $value : NULL);
    }
    public function getDocumentAttribute($value)
    {
        return asset($value ? 'storage/' . $value : NULL);
    }
}
