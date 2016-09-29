<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'information_fk', 'id');
    }
    public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_fk');
    }
}
