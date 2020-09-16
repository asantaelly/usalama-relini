<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class OfficerConcerned extends Model
{
    protected $guarded = [];

    public function officer_contacts()
    {
        return $this->hasMany(OfficerContact::class);
    }

    public function officer_accident_log_sms_status($accident_log_id, $officer_contact_id)
    {
        return DB::table('accident_log_contact')->where('accident_id', $accident_log_id)->where('officer_contact_id', $officer_contact_id)->first();
    }
}
