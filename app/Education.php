<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'worker_educations';

    public function profile() {
        return $this->belongsTo('App\Profile');
    }
}
