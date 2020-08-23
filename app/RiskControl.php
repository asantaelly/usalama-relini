<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskControl extends Model
{
    protected $guarded = [];


    public function risk_identification()
    {
        return $this->belongsTo(RiskIdentification::class);
    }
}
