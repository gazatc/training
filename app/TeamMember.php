<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    //
    protected $fillable = ['team_id', 'job_seeker_id'];
}
