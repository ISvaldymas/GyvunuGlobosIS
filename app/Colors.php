<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    public function decorations()
    {
        return $this->belongsTo('App\Decorations', 'colors_fk', 'id');
    }
}
