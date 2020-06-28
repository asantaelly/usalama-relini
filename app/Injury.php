<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    protected $guarded = [];

    public static function get_dropdown_menu()
    {
        return self::all()->map(function($injury){
            $data['option'] = $injury->nature;
            $data['value'] = $injury->id;
            return $data;
        });
    }

    public function accidents()
    {
        return $this->belongsToMany(Accident::class);
    }
}
