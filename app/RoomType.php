<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    //
     public function room_type()
    {
        return $this->belongsTo('App\Room', 'room_type_fk', 'id');
    }
}
