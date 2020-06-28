<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $guarded = [];

    public static function get_dropdown_menu()
    {
        return self::all()->map(function($section){
            $data['option'] = $section->code_name;
            $data['value'] = $section->id;
            return $data;
        });
    }

    public function accidents()
    {
        return $this->hasMany(Accident::class);
    }
}
