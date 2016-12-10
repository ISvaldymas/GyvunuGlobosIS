<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    public function colors()
    {
        return $this->belongsTo('App\Decoration', 'colors_fk', 'id');
    }
}
