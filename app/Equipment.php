<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = ['name'];

    public function units()
    {
        return $this->belongsToMany(\App\Unit::class);
    }
}
