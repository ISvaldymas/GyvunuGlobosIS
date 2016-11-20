<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function decorations()
    {
        return $this->belongsTo('App\Decorations', 'design_fk', 'id');
    }
}
