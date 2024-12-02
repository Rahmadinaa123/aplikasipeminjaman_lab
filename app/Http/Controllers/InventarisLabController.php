<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\inventarisLab;
use Illuminate\Http\Request;

class InventarisLabController extends Controller
{
     //halaman Inventaris Lab
    public function index() {
        $data=inventarisLab::all();
        return view('Laboran.inventaris_Lab.Index', compact('data'));
   }
   
    //halaman Inventaris lab
    public function addInventarisLab() {
        $users=User::all();
        return view('Laboran.inventaris_lab.tambahdata', compact('users'));
   }

   public function postInventarisLab(Request $request)
{
    $request->validate([
        'nama_barang' => 'required',          // Nama barang
        'nama_lab' => 'required',             // Nama lab (readonly di form)
        'kode_barang' => 'required',          // Kode barang
        'kategori' => 'required',             // Kategori barang
        'jumlah' => 'required|integer|min:1', // Jumlah barang
        'kondisi' => 'required',              // Kondisi barang
    ]);

    //dd($request->all());

    // Membuat instance baru dari model InventarisLab
    $inventaris_lab = new InventarisLab;

    // Mengisi data berdasarkan input dari form
    $inventaris_lab->nama_barang = $request->nama_barang;
    $inventaris_lab->nama_lab = $request->nama_lab; // Diambil dari Auth::user()->nama_lab
    $inventaris_lab->kode_barang = $request->kode_barang;
    $inventaris_lab->kategori = $request->kategori;
    $inventaris_lab->jumlah = $request->jumlah;
    $inventaris_lab->kondisi = $request->kondisi;

    // Menyimpan data ke database
    $inventaris_lab->save();

    // Mengecek apakah proses simpan berhasil
    if ($inventaris_lab) {
        return redirect()->route('laboran.inventaris_lab')->with('success', 'Data berhasil ditambahkan!');
    } else {
        return back()->with('failed', 'Terjadi kesalahan, coba lagi nanti.');
    }
}

public function editInventarisLab($id) {
    $inventaris = InventarisLab::find($id);
    return view('laboran.inventaris_lab.edit', compact('inventaris'));
}

public function postEditInventarisLab(Request $request, $id)
{
    $request->validate([
        'nama_barang' => 'required',          // Nama barang
        'nama_lab' => 'required',             // Nama lab (readonly di form)
        'kode_barang' => 'required',          // Kode barang
        'kategori' => 'required',             // Kategori barang
        'jumlah' => 'required|integer|min:1', // Jumlah barang
        'kondisi' => 'required',              // Kondisi barang
    ]);

    // Mencari data inventaris berdasarkan ID
    $inventaris_lab = InventarisLab::find($id);

    // Memperbarui data inventaris
    $inventaris_lab->nama_barang = $request->nama_barang;
    $inventaris_lab->nama_lab = $request->nama_lab; // Tetap diambil dari input (readonly di form)
    $inventaris_lab->kode_barang = $request->kode_barang;
    $inventaris_lab->kategori = $request->kategori;
    $inventaris_lab->jumlah = $request->jumlah;
    $inventaris_lab->kondisi = $request->kondisi;

    // Menyimpan perubahan ke database
    $inventaris_lab->save();

    // Mengecek apakah proses simpan berhasil
    if ($inventaris_lab) {
        return redirect()->route('laboran.inventaris_lab')->with('success', 'Data inventaris berhasil diperbarui!');
    } else {
        return back()->with('failed', 'Terjadi kesalahan, data gagal diperbarui!');
    }
}


}