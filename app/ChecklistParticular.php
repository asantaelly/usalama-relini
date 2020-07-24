<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistParticular extends Model
{
    protected $table = 'checklist_particulars';
    
    public function checklistItem(){
        return $this->belongsTo('App\ChecklistItem');
    }
}
