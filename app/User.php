<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Kardinalumai
    public function state()
    {
        return $this->hasOne('App\State', 'id', 'state_fk');
    }

    public function confirmed_email()
    {
        return $this->hasOne('App\EmailConfirm', 'email', 'email');
    }
}
