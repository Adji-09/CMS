<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPeraturan extends Model
{
    protected $table = 'peraturan';

    protected $fillable = ['user_id', 'deskripsi', 'peraturan', 'status']; 
}
