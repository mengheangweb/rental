<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['user_id', 'unit_id', 'price'];

    public function getPriceInUSDAttribute()
    {
        return "$ {$this->price}";
    }

    public function unit()
    {
        return $this->belongsTo(\App\Unit::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
