<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class MahasiswaPeminjamanInventarisLabController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index(Request $request) {
        $labName = $request->query('lab'); // Menangkap parameter lab dari URL
        return view('Mahasiswa.peminjamaninventaris', compact('labName'));
   }
}