<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'password',
        'firstname', 'lastname', 'address','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];


    // public function orders()
    // {
    //     return $this->hasMany('App\Order');
    // }

    // public function isAdmin()
    // {
    //     return $this->role_id; // this looks for an admin column in your users table
    // }

    // public function orders(){
    // return $this->belongsToMany("App\Order");
    // }
}
