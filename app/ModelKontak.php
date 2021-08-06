<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelKontak extends Model
{
    protected $table = 'kontak';

    protected $fillable = ['user_id', 'nama', 'email', 'no_telpon', 'pesan']; 
}
