<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function entertainment()
    {
        return $this->belongsTo('App\Entertainment', 'activity_fk', 'id');
    }
}
