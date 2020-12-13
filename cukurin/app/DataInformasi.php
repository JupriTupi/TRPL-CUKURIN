<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataInformasi extends Model
{
    protected $table = 'artikel';
    protected $fillable= ['jenisInformasi', 'judul', 'ulasan'];
}
