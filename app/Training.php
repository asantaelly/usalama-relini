<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';

    public function role() {  
        return $this->belongsTo('App\Role');
    }

    public function attendaces() {
        return $this->hasMany('App\Attendance');
    }

}
