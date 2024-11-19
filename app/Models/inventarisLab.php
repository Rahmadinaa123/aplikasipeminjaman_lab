<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventarisLab extends Model
{
    use HasFactory;
      protected $fillable = [
        'nama_barang',
        'nama_lab',
        'kode_barang',
        'kategori',
        'jumlah',
        'kondisi',
    ];
}