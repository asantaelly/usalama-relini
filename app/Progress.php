<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $guarded = [];

    public function accident()
    {
        return $this->belongsTo(Accident::class);
    }
}
