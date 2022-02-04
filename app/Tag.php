<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // RELAZIONE POST
    // tags - post

    public function Posts() {
        return $this->belongsToMany('App\Post');
    }
}
