<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = [];

    public function standards()
    {
        return $this->hasMany(Standard::class);
    }
}
