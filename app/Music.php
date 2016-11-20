<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function decorations()
    {
        return $this->belongsTo('App\Decorations', 'music_fk', 'id');
    }
}
