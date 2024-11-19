<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamanInventarisLab extends Model
{
    use HasFactory;

     // Nama tabel di database
    protected $table = 'peminjaman_inventaris_labs';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'username',
        'nim',
        'prodi',
        'semester',
        'nama_lab',
        'nama_barang',
        'keperluan',
        'id_user', // foreign key yang mengacu pada tabel users
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}