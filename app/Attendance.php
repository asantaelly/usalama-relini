<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function trainings() {
        return $this->belongsTo('App\Training');
    }
}
