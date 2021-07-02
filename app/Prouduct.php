<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prouduct extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
