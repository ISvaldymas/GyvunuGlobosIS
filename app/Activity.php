<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function activity()
    {
        return $this->belongsTo('App\Entertainment', 'activity_fk', 'id');
    }

    public $table = "activity";
}
