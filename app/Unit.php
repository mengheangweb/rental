<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // protected $table = "units_item";

    protected $fillable = ['name', 'price', 'size', 'category_id'];

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(\App\Equipment::class);
    }
}
