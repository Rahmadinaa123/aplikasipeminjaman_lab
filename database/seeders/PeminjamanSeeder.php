<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman')->insert([
            'username' => 'mahasiswa1',
            'nim' => 'MHS001',
            'prodi' => 'Teknik Informatika',
            'semester' => '9',
            'nama_lab' => 'Lab Testing',
            'keperluan' => 'Mengerjakan tugas praktikum',
            'id_user' => 3, 
            'tanggal_mulai' => Carbon::now()->subDays(1), // Satu hari yang lalu
            'tanggal_selesai' => Carbon::now()->addDays(1), // Berakhir besok
            'jam_mulai' => '08:00',
            'jam_selesai' => '12:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('peminjaman')->insert([
            'username' => 'mahasiswa2',
            'nim' => 'MHS002',
            'prodi' => 'Teknik Informatika',
            'semester' => '4',
            'nama_lab' => 'Lab Testing',
            'keperluan' => 'Mengerjakan tugas praktikum',
            'id_user' => 4, 
            'tanggal_mulai' => Carbon::now()->subDays(1), // Satu hari yang lalu
            'tanggal_selesai' => Carbon::now()->addDays(1), // Berakhir besok
            'jam_mulai' => '08:00',
            'jam_selesai' => '12:00',
            'status' => 'selesai',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}