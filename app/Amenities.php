<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
        public function amenities()
    {
        return $this->belongsTo('App\Room');
    }
}
