<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // protected $table='users';
    protected $fillable = [
        'name', 'email','image', 'pass','address','phone', 'remember_token','updated_at','created_at'
    ];

    
    protected $hidden = [
        'pass'
    ];

    public function user()
    {
    	return $this->hasMany('App\comment','id_user','id');
    }
}
