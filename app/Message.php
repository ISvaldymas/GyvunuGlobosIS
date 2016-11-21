<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bodyMessage', 'subject', 'email',
    ];

    //Kardinalumai
    public function message_recipient()
    {
        return $this->hasMany('App\Userinformation', 'id', 'user_email_fk');
    }
}
