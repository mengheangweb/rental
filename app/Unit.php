<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    // protected $table = "units_item";
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'size', 'category_id'];

    public function getNameWithSizeAttribute()
    {
        return "{$this->name}({$this->size})";
    }

    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    public function rent()
    {
        return $this->hasMany(\App\Rent::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(\App\Equipment::class);
    }
}
