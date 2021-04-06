<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = ['leader_id', 'name', 'bio'];

    public function leader() {
        return $this->belongsTo(JobSeeker::class, 'leader_id');
    }

    public function members() {
        return $this->belongsToMany(JobSeeker::class, 'team_members');
    }
}
