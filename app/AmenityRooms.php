<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmenityRooms extends Model
{
    //
    public function amenities()
    {
    	return $this->belongsTo('App\Amenities');
    }
    public function room()
    {
    	return $this->belongsTo('App\Room');
    }

}
