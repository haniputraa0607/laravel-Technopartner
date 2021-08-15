<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ["id_kategori", "nominal_trans", "deskripsi", "date"];
    protected $primaryKey = 'id_transaksi';
}
