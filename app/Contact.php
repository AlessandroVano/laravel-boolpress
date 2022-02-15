<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // MASS ASSIGNMENT

    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
