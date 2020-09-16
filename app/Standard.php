<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $guarded = [];

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
