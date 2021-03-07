<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSeekerInformation extends Model
{
    //
    protected $fillable = ['job_seeker_id', 'region_id', 'category_id', 'avatar', 'bio', 'skills', 'phone', 'degree', 'age'];

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/' . $value : '/images/default.png');
    }


    public function region() {
        return $this->belongsTo(Region::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
