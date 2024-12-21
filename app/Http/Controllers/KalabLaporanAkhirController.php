<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class KalabLaporanAkhirController extends Controller
{
    public function index() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjaman::where('status', 'selesai')->get();
    return view('kalab.laporan_akhir.index', compact('data'));
}
public function inventaris() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjamanInventarisLab::where('status', 'selesai')->get();
    return view('kalab.laporan_akhir.laporanInventaris', compact('data'));
}
    
}