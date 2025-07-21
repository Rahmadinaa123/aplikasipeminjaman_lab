<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KalabPeminjamanLabController extends Controller
{
    //halaman peminjaman lab
    public function index() {
    $data = peminjaman::orderBy('created_at', 'desc')->get(); // urutkan terbaru di atas

    $peminjamanPending = Peminjaman::where([
        ['nama_lab', '=', Auth::user()->nama_lab],
        ['status', '=', 'pending']
    ])->count();

    return view('Kalab.peminjaman_lab.index', compact('data', 'peminjamanPending'));
}


   public function detail($id) {
        $data = peminjaman::find($id);
        return view('Kalab.peminjaman_lab.detail', compact('data'));
    }
     public function editPeminjamanLab($id) {
        $data = peminjaman::find($id);
        return view('Kalab.peminjaman_lab.edit', compact('data'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $peminjaman_lab = peminjaman::find($id);
        $peminjaman_lab->status = $request->status;
        $peminjaman_lab->save();

        if ($peminjaman_lab) {
            return redirect('/kalab/peminjaman_lab')->with('success', 'Status berhasil diubah!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }


}