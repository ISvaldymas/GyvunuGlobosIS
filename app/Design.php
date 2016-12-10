<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    public function design()
    {
        return $this->belongsTo('App\Decoration', 'design_fk', 'id');
    }
    public $table = "design";
}
