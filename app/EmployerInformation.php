<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerInformation extends Model
{
    //
    protected $fillable = ['employer_id', 'region_id', 'category_id', 'avatar', 'bio', 'phone', 'type', 'year', 'address'];

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
