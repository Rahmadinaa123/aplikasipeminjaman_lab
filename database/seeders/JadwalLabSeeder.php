<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JadwalLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('jadwal_labs')->insert([
            'hari' => 'senin',
            'jam_mulai' => '08:00',
            'jam_selesai' => '12:00',
            'kelas' => '3A',
            'prodi' => 'Teknik Informatika',
            'nama_lab' => 'Lab Testing',
            'mata_kuliah' => 'Data mining',
            'dosen' => 'Lidya wati, M.Kom',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

         DB::table('jadwal_labs')->insert([
            'hari' => 'selasa',
            'jam_mulai' => '08:00',
            'jam_selesai' => '12:00',
            'kelas' => '5A',
            'prodi' => 'Teknik Informatika',
            'nama_lab' => 'Lab Jaringan Komputer',
            'mata_kuliah' => 'Jaringan',
            'dosen' => 'Agus Tedyyana M.Kom',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}