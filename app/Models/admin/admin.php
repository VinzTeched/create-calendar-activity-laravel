<?php

namespace App\Models\admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
	
	public function roles()
	{
		return $this->belongsToMany('App\Models\admin\role');
	}

	public function getNameAttribute($value)
	{
		return ucfirst($value);
	}
	
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
