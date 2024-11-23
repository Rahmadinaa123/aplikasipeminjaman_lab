<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class MahasiswaPeminjamanInventarisLabController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index() {
        $data=peminjamanInventarisLab::all();
        return view('Mahasiswa.peminjamaninventaris', compact('data'));
   }
}