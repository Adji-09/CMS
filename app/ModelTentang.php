<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTentang extends Model
{
    protected $table = 'tentang';

    protected $fillable = ['user_id', 'judul', 'sub_judul', 'konten']; 
}
