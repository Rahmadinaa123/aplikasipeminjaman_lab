<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('inventaris_labs')->insert([
            'nama_barang' => 'pc',
            'nama_lab' => 'Lab Testing',
            'kode_barang' => 'TS-001',
            'kategori' => 'hardware',
            'jumlah' => '35',
            'kondisi' => 'baik',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

          DB::table('inventaris_labs')->insert([
            'nama_barang' => 'in-focus',
            'nama_lab' => 'Lab Testing',
            'kode_barang' => 'TS-002',
            'kategori' => 'hardware',
            'jumlah' => '1',
            'kondisi' => 'baik',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

          DB::table('inventaris_labs')->insert([
            'nama_barang' => 'pc',
            'nama_lab' => 'Lab Jaringan Komputer',
            'kode_barang' => 'JK-001',
            'kategori' => 'hardware',
            'jumlah' => '32',
            'kondisi' => 'baik',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}