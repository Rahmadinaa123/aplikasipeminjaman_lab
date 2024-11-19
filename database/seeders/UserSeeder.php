<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun untuk Laboran
        DB::table('users')->insert([
            'username' => 'laboran',
            'nim' => '0',
            'prodi' => 'rpl',
            'semester' => '3',
            'no_hp' => '082284434534',
            'email' => 'dina@gmail.com',
            'password' => Hash::make('123456789'),
            'nama_lab' => 'Lab Testing',
            'level' => 'laboran',
        ]);

        DB::table('users')->insert([
            'username' => 'laboran',
            'nim' => '0',
            'prodi' => 'rpl',
            'semester' => '3',
            'no_hp' => '082284434534',
            'email' => 'laboranTI@gmail.com',
            'password' => Hash::make('123456789'),
            'nama_lab' => 'Lab Software Development',
            'level' => 'laboran',
        ]);

        // Akun untuk Mahasiswa
        DB::table('users')->insert([
            'username' => 'student01',
            'nim' => '123456',
            'prodi' => 'informatika',
            'semester' => '5',
            'no_hp' => '082284489890',
            'email' => 'student@gmail.com',
            'password' => Hash::make('mahasiswa123'),
            'level' => 'mahasiswa',
        ]);

        DB::table('users')->insert([
            'username' => 'student02',
            'nim' => '1279789',
            'prodi' => 'RPL',
            'semester' => '3',
            'no_hp' => '082284489890',
            'email' => 'student2@gmail.com',
            'password' => Hash::make('mahasiswa123'),
            'level' => 'mahasiswa',
        ]);

        // Akun untuk Ketua Laboran
        DB::table('users')->insert([
            'username' => 'ketualab01',
            'nim' => '0',
            'prodi' => 'rpl',
            'semester' => '4',
            'no_hp' => '082284456898',
            'email' => 'ketualaboran@gmail.com',
            'password' => Hash::make('kalab1234'),
            'nama_lab' => 'Lab Testing',
            'level' => 'ketua laboran',
        ]);
    }
}