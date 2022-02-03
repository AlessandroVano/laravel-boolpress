<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'slug'
    ];


    // RELAZIONE CATEGORIE
         // post - category;
         
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
