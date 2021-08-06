<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUser extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id', 'name', 'username', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
