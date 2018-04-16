<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userl extends Model
{
     protected $fillable = [
        'username',
        'email'
        // add all other fields
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'userls';
}
