<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficerContact extends Model
{
    protected $guarded = [];

    public function officer_concerned()
    {
        return $this->belongsTo(OfficerConcerned::class);
    }
}
