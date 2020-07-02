<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InspectionCategory extends Model
{
    protected $table = 'inspection_parts';


    public function inspection_section(){
        $this->belongsTo('App\InspectionSection');
    }
}
