<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    public function user_information()
    {
        return $this->belongsTo('App\UserInformation', 'age_group_fk', 'id');
    }
}
