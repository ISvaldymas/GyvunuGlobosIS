<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user_information()
    {
        return $this->belongsTo('App\UserInformation', 'photo_fk', 'id');
    }
    public function room()
    {
        return $this->belongsTo('App\Room', 'photo_fk', 'id');
    }

}
