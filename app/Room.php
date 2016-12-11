<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function room_type()
    {
        return $this->hasOne('App\RoomType', 'id','room_type_fk');
    }
     public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_fk');
    }
    public function rate()
    {
        return $this->hasMany('App\Rate');
    }
        public function amenities()
    {
        return $this->hasMany('App\Amenities');
    }

}
