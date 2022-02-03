<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // category - post
    public function category() {
        return $this->hasMany('App\Post');
    }
}
