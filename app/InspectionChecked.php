<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionChecked extends Model
{
    protected $table = 'inspection_checked';

    public function checklist_item(){
        $this->belongsTo('App\ChecklistItem');
    }
}
