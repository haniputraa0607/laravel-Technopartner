<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["nama_kategori", "jenis_kategori", "deskripsi"];
    protected $primaryKey = 'id_kategori';
}
