<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['employer_id', 'category_id' , 'region_id', 'title', 'jobType', 'description',
        'requirement', 'last_date', 'salary_type', 'salary_amount', 'for'];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function getJobTypeTextAttribute() {
        switch ($this->jobType) {
            case 1 :
                return "دوام كامل";
                break;
            case 2 :
                return "دوام جزئي";
                break;
            case 3 :
                return "عن بعد";
                break;
        }
    }
}
