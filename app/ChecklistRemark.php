<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistRemark extends Model
{
    
    protected $table = 'checklist_remarks';
    
    public function checklistItem(){
        return $this->belongsTo('App\ChecklistItem');
    }
}
