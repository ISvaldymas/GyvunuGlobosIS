<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function room()
    {
    	return $this->belongsTo('App\Room');
    }
	public function rated_rooms()
    {
        return $this->belongsTo('App\RatedRooms');
    }
    public function stars_values()
    {
        return $this->hasOne('App\StarsValue','value','value_id');
    }
    public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_fk');
    }
}
