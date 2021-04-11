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

}
