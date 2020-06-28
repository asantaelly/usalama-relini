<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    protected $guarded = [];

    public static function get_dropdown_menu()
    {
        return self::all()->map(function($death){
            $data['option'] = $death->nature;
            $data['value'] = $death->id;
            return $data;
        });
    }

    public function accidents()
    {
        return $this->belongsToMany(Accident::class);
    }
}
