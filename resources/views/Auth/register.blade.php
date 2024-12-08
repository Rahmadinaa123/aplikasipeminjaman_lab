<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #9dd9f3;
        }

        .login-box {
            width: 600px;
            height: auto;
            margin-top: 20px;
            margin-bottom: 40px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-btn {
            background-color: #4F54F1;
            color: white;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #56bae4;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .text-danger {
            font-size: 0.875rem;
            /* Ukuran font yang lebih kecil */
            margin-top: 5px;
            /* Jarak antara input dan pesan error */
        }

        input.is-invalid {
            border-color: red;
            /* Memberikan border merah pada input yang error */
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="login-box">
            <a class="btn btn-outline-primary" href="/"">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Login Gagal!</strong> {{ Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4" style="color: #8A7FCB;">REGISTER</h2>
            <form action="{{ route('postRegister') }}" method="POST" class="register-form">
                {{ csrf_field() }}

                <!-- Nama -->
                <div class="mb-3 form-group">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="Username">
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Nim -->
                <div class="mb-3 form-group">
                    <label for="nim" class="form-label">Nim</label>
                    <input type="number" class="form-control @error('nim') is-invalid @enderror" id="nim"
                        name="nim" placeholder="NIM">
                    <span class="text-danger">
                        @error('nim')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Prodi -->
                <div class="mb-3">
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                            <option value="" disabled selected>Pilih Prodi</option>
                            <option value="teknik-informatika">D3-Teknik Informatika</option>
                            <option value="sistem-informasi">D4-Rekayasa Perangkat Lunak</option>
                            <option value="teknik-elektro">D4-Keamanan Sistem Informasi</option>
                            <option value="manajemen">D2-Admistrasi Jaringan Komputer</option>
                        </select>
                        <span class="text-danger">
                            @error('prodi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <!-- Semester -->
                <div class="mb-3 form-group">
                    <label for="semester" class="form-label">Semester</label>
                    <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester"
                        name="semester" placeholder="Semester">
                    <span class="text-danger">
                        @error('semester')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Nomor Hp -->
                <div class="mb-3 form-group">
                    <label for="no_hp" class="form-label">Nomor Hp</label>
                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" placeholder="Nomor hp">
                    <span class="text-danger">
                        @error('no_hp')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Email -->
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="Email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Password -->
                <div class="mb-3 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group">
                    <input type="submit" name="signup" id="signup" class="form-submit btn btn-primary"
                        value="Register">
                </div>

                <!-- Sudah Punya Akun -->
                <div class="text-center mt-3">
                    <small>Sudah Punya Akun? Silahkan <a href="login">Login Disini!</a></small>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>©<span>Copyright2024</span><strong class="px-1 sitename">Sipela</strong><span>Teknik
                Informatika</span>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
