<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'duration', 'body',
    ];

	public function reservation()
    {
        return $this->hasOne('App\Reservations', 'id', 'fk_reservation');
    }

    public function theme()
    {
        return $this->hasOne('App\Theme', 'id', 'theme_fk');
    }
     public function activity()
    {
        return $this->hasOne('App\Activity', 'id', 'activity_fk');
    }

    public $table = "entertainment";

}
