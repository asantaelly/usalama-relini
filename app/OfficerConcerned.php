<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficerConcerned extends Model
{
    protected $guarded = [];

    public function officer_contacts()
    {
        return $this->hasMany(OfficerContact::class);
    }
}
