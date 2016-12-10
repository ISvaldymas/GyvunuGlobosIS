<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decoration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'body',
    ];

    //Kardinalumai
    public function reservation()
    {
        return $this->hasOne('App\Reservations', 'id', 'fk_reservation');
    }

    public function colors()
    {
        return $this->hasOne('App\Colors', 'id', 'colors_fk');
    }

      public function music()
    {
        return $this->hasOne('App\Music', 'id', 'music_fk');
    }

      public function design()
    {
        return $this->hasOne('App\Design', 'id', 'design_fk');
    }

    public function themes()
    {
        return $this->hasOne('App\Theme', 'id', 'theme_fk');
    }

    public $table = "decoration";
}