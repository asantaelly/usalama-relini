<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskIdentification extends Model
{
    protected $guarded = [];

    
    public static function get_dropdown_menu()
    {
        return self::all()->map(function($risk){
            $data['option'] = $risk->risk_id;
            $data['value'] = $risk->id;
            return $data;
        });
    }

    public function risk_control()
    {
        return $this->hasMany(RiskControl::class);
    }
}
