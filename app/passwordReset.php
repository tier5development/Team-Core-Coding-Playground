<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\passwordReset as Authenticable;


class passwordReset extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'token', 
    ];

    protected $hidden = [
        'token',
    ];
}
