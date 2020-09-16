<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'worker_profiles';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function educations() {
        return $this->hasMany('App\Education', 'worker_profile_id');
    }
    
    public function qualifications() {
        return $this->hasMany('App\Qualify', 'worker_profile_id');
    }
}
