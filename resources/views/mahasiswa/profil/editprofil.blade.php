@extends('layouts.mahasiswa.app', [
    'title' => 'Edit Profil Mahasiswa',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Profil Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="username">Nama:</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ Auth::user()->username }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nim">NIM:</label>
                            <input type="text" name="nim" id="nim" class="form-control"
                                value="{{ Auth::user()->nim }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="prodi">Program Studi:</label>
                            <input type="text" name="prodi" id="prodi" class="form-control"
                                value="{{ Auth::user()->prodi }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="semester">Semester:</label>
                            <input type="text" name="semester" id="semester" class="form-control"
                                value="{{ Auth::user()->semester }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">No. HP:</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control"
                                value="{{ Auth::user()->no_hp }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_lab">Nama Lab:</label>
                            <input type="text" name="nama_lab" id="nama_lab" class="form-control"
                                value="{{ Auth::user()->nama_lab }}" required>
                        </div>

                        <div class="form-group text-end">
                            <a href="mahasiswa/profil" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
