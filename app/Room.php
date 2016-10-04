<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function room_type()
    {
        return $this->hasOne('App\RoomType', 'id', 'room_type_fk');
    }

}
