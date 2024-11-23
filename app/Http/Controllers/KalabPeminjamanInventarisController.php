<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class KalabPeminjamanInventarisController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index() {
        $data=peminjamanInventarisLab::all();
        return view('Kalab.peminjaman_inventaris.Index', compact('data'));
   }
}