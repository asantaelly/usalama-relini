<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $table = 'checklist_items';

    public function particulars(){
        return $this->hasMany('App\ChecklistParticular', 'checklist_item_id');
    }

    public function checks(){
        return $this->hasMany('App\ChecklistInspectionCheck');
    }

    public function remarks(){
        return $this->hasMany('App\ChecklistRemark');
    }
}
