<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use App\Models\inventarisLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KalabPeminjamanInventarisController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index() {
    $data = PeminjamanInventarisLab::orderBy('created_at', 'desc')->get(); // terbaru di atas

    $peminjamanPending = PeminjamanInventarisLab::where([
        ['nama_lab', '=', Auth::user()->nama_lab],
        ['status', '=', 'pending']
    ])->count();

    return view('Kalab.peminjaman_inventaris.index', compact('data', 'peminjamanPending'));
}

    public function detail($id) {
        $data = PeminjamanInventarisLab::find($id);
        return view('Kalab.peminjaman_inventaris.detail', compact('data'));
    }
    public function editpeminjamanInventaris($id) {
        $peminjaman = PeminjamanInventarisLab::find($id);
        $inventaris=inventarisLab::all();
        return view('Kalab.peminjaman_inventaris.edit', compact('peminjaman','inventaris'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $peminjaman_lab = PeminjamanInventarisLab::find($id);
        $peminjaman_lab->status = $request->status;
        $peminjaman_lab->save();

        if ($peminjaman_lab) {
            return redirect('/kalab/peminjaman_inventaris')->with('success', 'Status berhasil diubah!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

}