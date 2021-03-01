<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerSocial extends Model
{
    //
    protected $fillable = ['employer_id', 'web', 'linkedin', 'twitter', 'instagram', 'whatsapp'];
}
