<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $guarded = [];

    public function deaths()
    {
        return $this->belongsToMany(Death::class)->withPivot('number');
    }

    public function injuries()
    {
        return $this->belongsToMany(Injury::class,)->withPivot('number');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public static function get_dropdown_menu()
    {
        return self::all()->map(function($accident){
            $data['option'] = $accident->reference_number;
            $data['value'] = $accident->id;
            return $data;
        });
    }

}
