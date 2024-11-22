<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanLabController;
use App\Http\Controllers\MahasiswaPeminjamanLabController;
use App\Http\Controllers\InventarisLabController;
use App\Http\Controllers\PeminjamanInventarisController;
use App\Http\Controllers\JadwalLabController;
use App\Http\Controllers\LaporanAkhirController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KalabController;
use App\Http\Controllers\KalabPeminjamanLabController;
use App\Http\Controllers\KalabInventarisLabController;

Route::get('/', function () {
    return view('index');
});
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


Route::middleware(['guest'])->group(function () {
    Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
    Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
    Route::get('/registrasi', [LoginRegisterController::class, 'register'])->name('auth.register');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('auth.login');
});

Route::group(['middleware' => ['auth', 'checklevel:laboran']], function () {
   Route::get('laboran/home', [LaboranController::class, 'index'])->name('laboran.home');
   Route::get('laboran/profil', [LaboranController::class, 'profil'])->name('laboran.profil');
   //user
   Route::get('laboran/user', [UserController::class, 'index'])->name('laboran.user');
   Route::get('laboran/user/tambah', [UserController::class, 'addUser'])->name('laboran.user.tambah');
   Route::post('/postUser', [UserController::class, 'postUser'])->name('laboran.postUser');
   Route::get('laboran/user/edit/{id}', [UserController::class, 'updateUser'])->name('laboran.user.edit');
   Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
   Route::post('/postEditUser/{id}', [UserController::class, 'postEditUser'])->name('postEditUser');
   Route::get('/laboran/user/detail/{id}', [UserController::class, 'detail'])->name('laboran.user.detail');
   Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
   
   //peminjaman lab
   Route::get('laboran/peminjaman_lab', [PeminjamanLabController::class, 'index'])->name('laboran.peminjaman_lab');
   Route::get('laboran/peminjaman_lab/tambah', [PeminjamanLabController::class, 'addPeminjaman'])->name('laboran.peminjaman_lab.tambah');
   Route::post('laboran/postPeminjamanLab', [PeminjamanLabController::class, 'postPeminjamanLab'])->name('laboran.postpeminjamanLab');
   Route::get('laboran/peminjaman_lab/edit/{id}', [PeminjamanLabController::class, 'updatePeminjamanLab'])->name('laboran.PeminjamanLab.edit');
   Route::get('/editPeminjamanLab/{id}', [PeminjamanLabController::class, 'editPeminjamanLab'])->name('editPeminjamanLab');
   Route::post('/postEditPeminjamanLab/{id}', [PeminjamanLabController::class, 'postEditPeminjamanLab'])->name('postEditPeminjamanLab');
   Route::get('/laboran/peminjaman_lab/detail/{id}', [PeminjamanLabController::class, 'detail'])->name('laboran.peminjaman_lab.detail');
   Route::get('/deletePeminjamanLab/{id}', [PeminjamanLabController::class, 'deletePeminjamanLab'])->name('deletePeminjamanLab');
   
   //inventarislab 
   Route::get('laboran/inventaris_lab', [InventarisLabController::class, 'index'])->name('laboran.inventaris_lab');
   Route::get('laboran/inventaris_lab/tambah', [InventarisLabController::class, 'addInventarisLab'])->name('laboran.inventaris_lab.tambah');
   Route::post('/postinventaris_lab', [InventarisLabController::class, 'postInventarisLab'])->name('laboran.postinventaris_lab');
   
   //peminjaman inventaris
   Route::get('laboran/peminjaman_inventaris', [PeminjamanInventarisController::class, 'index'])->name('laboran.peminjaman_inventaris');
   Route::get('laboran/peminjaman_inventaris/tambah', [PeminjamanInventarisController::class, 'addPeminjamanInventaris'])->name('laboran.peminjaman_inventaris.tambah');
   Route::post('/postpeminjaman_inventaris', [PeminjamanInventarisController::class, 'postPeminjamanInventaris'])->name('laboran.postpeminjaman_inventaris');
   
   //jadwal lab
   Route::get('laboran/jadwal_lab', [JadwalLabController::class, 'index'])->name('laboran.jadwal_lab');
   Route::get('laboran/jadwal_lab/tambah', [JadwalLabController::class, 'addJadwalLab'])->name('laboran.jadwal_lab.tambah');
   Route::post('/postjadwal_lab', [JadwalLabController::class, 'postJadwalLab'])->name('laboran.postjadwal_lab');

   //laporan akhir
   Route::get('laboran/laporan_akhir', [LaporanAkhirController::class, 'index'])->name('laboran.laporan_akhir');
   Route::get('laboran/laporan_akhir/inventaris', [LaporanAkhirController::class, 'inventaris'])->name('laboran.laporan_akhir.invetaris');
   
});

Route::group(['middleware' => ['auth', 'checklevel:mahasiswa']], function () {
   Route::get('mahasiswa/home', [MahasiswaController::class, 'index'])->name('mahasiswa.home');
   Route::get('mahasiswa/daftarLab', [MahasiswaController::class, 'daftarLab'])->name('mahasiswa.daftarLab');
   Route::get('mahasiswa/pinjamLab', [MahasiswaController::class, 'pinjamLab'])->name('mahasiswa.pinjamLab');
   Route::post('/postPeminjamanLab', [MahasiswaPeminjamanLabController::class, 'postPeminjamanLab'])->name('mahasiswa.postPeminjamanLab');
   Route::get('mahasiswa/profil', [MahasiswaController::class, 'profil'])->name('mahasiswa.profil');
   Route::get('mahasiswa/jadwal', [jadwalLabController::class, 'mahasiswajadwal'])->name('mahasiswa.jadwal');
   Route::get('mahasiswa/riwayatPeminjamanLab', [MahasiswaPeminjamanLabController::class, 'peminjamanLab'])->name('mahasiswa.riwayatPeminjamanLab');
});

Route::group(['middleware' => ['auth', 'checklevel:ketua laboran']], function () {
   Route::get('kalab/home', [kalabController::class, 'index'])->name('kalab.home');
   Route::get('kalab/profil', [KalabController::class, 'profil'])->name('kalab.profil');

   //peminjaman lab
   Route::get('kalab/peminjaman_lab', [KalabPeminjamanLabController::class, 'index'])->name('kalab.peminjaman_lab');

   //peminjaman inventaris
   Route::get('kalab/peminjaman_inventaris', [KalabInventarisLabController::class, 'index'])->name('kalab.peminjaman_inventaris');
});

// Route::get('/registrasi', [LoginRegisterController::class, 'register'])->name('auth.register');
// Route::get('login', [LoginRegisterController::class, 'login'])->name('auth.login');