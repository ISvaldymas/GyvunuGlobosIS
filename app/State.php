<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'state_fk', 'id');
    }
}
