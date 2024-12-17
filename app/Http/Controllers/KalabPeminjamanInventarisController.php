<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class KalabPeminjamanInventarisController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index() {
        $data=PeminjamanInventarisLab::all();
        return view('Kalab.peminjaman_inventaris.Index', compact('data'));
   }
    public function detail($id) {
        $data = PeminjamanInventarisLab::find($id);
        return view('kalab.peminjaman_inventaris.detail', compact('data'));
    }
}