<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBasisData extends Model
{
    protected $table = 'basis_data';

    protected $fillable = ['user_id', 'nama_penulis', 'tahun', 'jenis_hiu', 'deskripsi', 'image', 'document', 'status']; 
}
