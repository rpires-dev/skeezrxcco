<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static function findByCatSlug($slug)
    {
        return static::where('slug', $slug)->first()->id;
    }
}
