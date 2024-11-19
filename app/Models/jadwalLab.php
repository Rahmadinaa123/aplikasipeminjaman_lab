<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalLab extends Model
{
    use HasFactory;
    protected $table = 'jadwal_labs';
    protected $fillable = [
        'hari', 'jam_mulai', 'jam_selesai', 'kelas', 'prodi', 'nama_lab', 'mata_kuliah', 'dosen'
    ];
}
