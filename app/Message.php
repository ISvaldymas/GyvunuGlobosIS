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

    public $table = "message";

    // public function recipient()
    // {
    //     return $this->hasOne('App\Userinformation', 'email', 'recipient_fk');
    // }

}
