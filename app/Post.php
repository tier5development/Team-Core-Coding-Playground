<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table names
    protected $table = 'posts';

    protected $fillable=['title','description','userEmail'];
    
    public $timestamp = true;
}
