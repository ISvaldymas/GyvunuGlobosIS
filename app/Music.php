<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function music()
    {
        return $this->belongsTo('App\Decoration', 'music_fk', 'id');
    }

    public $table = "music";
}
