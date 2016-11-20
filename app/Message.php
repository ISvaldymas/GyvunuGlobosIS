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
        'message_body', 'subject',
    ];

    //Kardinalumai
    public function message_recipient()
    {
        return $this->hasMany('App\MessageRecipient', 'id', 'message_id_fk');
    }
}
