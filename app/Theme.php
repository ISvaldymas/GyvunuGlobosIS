<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function decorations()
    {
        return $this->belongsTo('App\Decorations', 'theme_fk', 'id');
    }
}
