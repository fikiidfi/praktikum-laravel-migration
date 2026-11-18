<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // Menentukan kolom yang dapat diisi melalui mass assignment
    protected $fillable = ['kode', 'nama'];
}