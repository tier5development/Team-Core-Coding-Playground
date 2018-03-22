<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table names
    protected $table = 'posts';

    public $primaryKey = 'id';

    public $timestamp = true;
}
