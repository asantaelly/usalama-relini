<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionSection extends Model
{
    
    protected $table = 'inspection_sections';

    public function inspection_parts(){
        $this->hasMany('App\InspectionCategory');
    }
}
