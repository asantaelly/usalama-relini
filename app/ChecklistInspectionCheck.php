<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistInspectionCheck extends Model
{
    protected $table = 'checklist_inspection_checks';

    public function checklistItem(){
        return $this->belongsTo('App\ChecklistItem');
    }
}
