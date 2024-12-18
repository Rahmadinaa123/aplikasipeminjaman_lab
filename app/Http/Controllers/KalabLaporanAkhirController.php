<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalabLaporanAkhirController extends Controller
{
    public function index() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjaman::where('status', 'selesai')->get();
    return view('kalab.laporan_akhir.index', compact('data'));
}
    
}