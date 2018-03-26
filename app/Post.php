<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table names
    protected $table = 'posts';

    protected $fillable=['name','lname','email','password'];

    public $primaryKey = 'id';

    public $timestamp = true;
}
