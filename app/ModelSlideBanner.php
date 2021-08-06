<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelSlideBanner extends Model
{
    protected $table = 'slide_banner';

    protected $fillable = ['user_id', 'image', 'status']; 
}
