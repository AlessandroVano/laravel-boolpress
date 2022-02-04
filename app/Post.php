<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id',
    ];


    // RELAZIONE CATEGORIE
         // post - category;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    // RELAZIONE CON TAG

    // post - tags

    public function tags() {
        return $this->belongsToMany('App\Tag');

    }
}
