<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PeminjamanInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('peminjaman_inventaris_labs')->insert([
            'username' => 'mahasiswa1',
            'nim' => 'MHS001',
            'prodi' => 'Teknik Informatika',
            'semester' => '3',
            'nama_lab' => 'Lab Testing',
            'nama_barang' => 'In Focus',
            'id_user' => 3, 
            'tanggal_pinjam' => Carbon::now()->subDays(1), // Satu hari yang lalu
            'tanggal_kembali' => Carbon::now()->addDays(1), // Berakhir besok
            'jam_pinjam' => '08:00',
            'jam_kembali' => '12:00',
            'keperluan' => 'Mengerjakan tugas praktikum',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('peminjaman_inventaris_labs')->insert([
            'username' => 'mahasiswa2',
            'nim' => 'MHS002',
            'prodi' => 'Teknik Informatika',
            'semester' => '5',
            'nama_lab' => 'Lab Testing',
            'nama_barang' => 'In Focus',
            'id_user' => 4, 
            'tanggal_pinjam' => Carbon::now()->subDays(1), // Satu hari yang lalu
            'tanggal_kembali' => Carbon::now()->addDays(1), // Berakhir besok
            'jam_pinjam' => '08:00',
            'jam_kembali' => '12:00',
            'keperluan' => 'Mengerjakan tugas praktikum',
            'status' => 'selesai',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    
}