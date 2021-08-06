<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPublikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = ['user_id', 'judul', 'des_singkat', 'image', 'status']; 
}
