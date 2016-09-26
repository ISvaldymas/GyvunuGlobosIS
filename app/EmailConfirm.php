<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailConfirm extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
