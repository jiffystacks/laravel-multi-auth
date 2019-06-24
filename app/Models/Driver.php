<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use Notifiable;

    protected $guard = 'driver';

    protected $fillable = [
        'name', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
