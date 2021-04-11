<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Employer extends Authenticatable
{
    use Notifiable;

    protected $table = 'employers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'verified'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function information() {
        return $this->hasOne(EmployerInformation::class);
    }
    public function socials() {
        return $this->hasOne(EmployerSocial::class);
    }
    public function verify() {
        return $this->hasOne(EmployerVerify::class);
    }

    public function scopeVerified($query)
    {
        return $query->where('verified', 1);
    }
    public function scopeNotVerified($query)
    {
        return $query->where('verified', 0);
    }
}
