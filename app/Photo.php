<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user_information()
    {
        return $this->belongsTo('App\UserInformation', 'photo_fk', 'id');
    }
}
