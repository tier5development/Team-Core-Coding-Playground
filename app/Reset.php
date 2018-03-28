<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reset extends Model
{


	 protected $fillable = [
        'email',
        'token',
        // add all other fields
    ];


    protected $table = 'password_resets';
    public $timestamps = false;
    //
}
