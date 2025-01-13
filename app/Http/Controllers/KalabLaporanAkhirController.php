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
    return view('Kalab.laporan_akhir.index', compact('data'));
}
public function inventaris() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjamanInventarisLab::where('status', 'selesai')->get();
    return view('Kalab.laporan_akhir.laporanInventaris', compact('data'));
}
public function cetaklaporanpeminjamanlab() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjaman::where('status', 'selesai')->get();
    return view('Kalab.laporan_akhir.cetaklaporanpeminjamanlab', compact('data'));
}

public function cetaklaporanpeminjamaninventaris() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjamanInventarisLab::where('status', 'selesai')->get();
    return view('Kalab.laporan_akhir.cetaklaporanpeminjamaninventaris', compact('data'));
}
public function detail($id) {
        $data = peminjaman::find($id);
        return view('Kalab.laporan_akhir.detail', compact('data'));
    }
public function detailinventaris($id) {
    $data = peminjamanInventarisLab::find($id);
    return view('Kalab.laporan_akhir.detailinventaris', compact('data'));
}
    
}