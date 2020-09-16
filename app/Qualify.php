<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualify extends Model
{
    protected $table = 'worker_qualifications';

    public function profile() {
        return $this->belongsTo('App\Profile');
    }
}
