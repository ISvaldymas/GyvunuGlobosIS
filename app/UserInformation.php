<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'information_fk', 'id');
    }
    public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_fk');
    }
    public function age_group()
    {
        return $this->hasOne('App\AgeGroup', 'id', 'age_group_fk');
    }
}
