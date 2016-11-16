<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StarsValue extends Model
{
    public function stars_values()
    {
        return $this->belongsTo('App\Rate', 'value_id', 'value');
    }
}
