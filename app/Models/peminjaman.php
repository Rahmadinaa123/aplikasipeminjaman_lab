<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'peminjaman';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'username',
        'nim',
        'prodi',
        'semester',
        'nama_lab',
        'keperluan',
        'id_user', // foreign key yang mengacu pada tabel users
        'tanggal_mulai',
        'tanggal_selesai',
        
        'status',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}