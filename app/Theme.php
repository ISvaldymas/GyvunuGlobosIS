<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public function theme()
    {
        return $this->belongsTo('App\Entertainment', 'theme_fk', 'id');
    }

     public function themes()
    {
        return $this->belongsTo('App\Decoration', 'theme_fk', 'id');
    }

    public $table = "theme";
}
