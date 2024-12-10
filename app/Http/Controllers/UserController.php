<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     //halaman dashboard laboran
    public function index() {
        $data=User::where('nama_lab', Auth::user()->nama_lab)->get();
        return view('Laboran.user.Index', compact('data'));
   }

   public function addUser() {
     return view('Laboran.user.tambah');
    }

     public function postUser(Request $request) {
     $request->validate([
        'username' => 'required',
        'nim' => 'required',
        'prodi' => 'required',
        'semester' => 'required',
        'no_hp' => 'required',
        'email' => 'required',
        'password' => 'required|min:8|max:20',
        'nama_lab' => 'required',
        'level' => 'required'
    ]);
    
    $user = new User;
    
    $user->username = $request->username;
    $user->nim = $request->nim;
    $user->prodi = $request->prodi;
    $user->semester = $request->semester;
    $user->no_hp = $request->no_hp;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->nama_lab = $request->nama_lab;
    $user->level = $request->level;
    $user->save();
    if($user){
    return redirect('/laboran/user')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
    } else {
    return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }
}

     public function updateUser($id) {
          $data = User::find($id);
          return view('Laboran.user.edit', compact('data'));
  }

  public function editUser($id) {
        $data = User::find($id);
        return view('laboran.user.edit', compact('data'));
    }

    public function postEditUser(Request $request, $id)
    {
        $request->validate([
        'username' => 'required',
        'nim' => 'required',
        'prodi' => 'required',
        'semester' => 'required',
        'no_hp' => 'required',
        'email' => 'required',
        'nama_lab' => 'required',
        'level' => 'required'
        ]);

        $user = User::find($id);

        $user->username = $request->username;
        $user->nim = $request->nim;
        $user->prodi = $request->prodi;
        $user->semester = $request->semester;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->nama_lab = $request->nama_lab;
        $user->level = $request->level;

        $user->save();

        if ($user) {
            return redirect('/laboran/user')->with('success', 'User berhasil diupdate!');
        } else {
            return back()->with('failed', 'User gagal diupdate!');
        }
    }

    public function detail($id) {
        $data = User::find($id);
        return view('laboran.user.detail', compact('data'));
    }

  public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user) {
            return back()->with('success', 'Data User berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data User!');
        }
    }
}