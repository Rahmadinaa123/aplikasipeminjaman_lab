<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #9dd9f3;
        }

        .login-box {
            width: 600px;
            height: 450px;
            margin-top: 40px;
            margin-bottom: 40px;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            /* Menambahkan position relative agar alert dapat diposisikan dengan benar */
        }

        .login-btn {
            background-color: #4F54F1;
            color: white;
        }

        footer {
            position: relative;
            text-align: center;
            padding: 20px;
            background-color: #56bae4;
            bottom: 0;
            width: 100%;
        }

        /* Menambahkan posisi absolute agar alert menimpa judul LOGIN */
        .floating-alert {
            position: absolute;
            top: 60px;
            /* Menyesuaikan posisi agar alert menimpa judul LOGIN */
            left: 0;
            right: 0;
            /* Menyebar ke kanan dan kiri */
            margin: auto;
            /* Memusatkan alert */
            width: 600px;
            /* Sesuaikan ukuran alert hampir sama dengan login box */
            z-index: 1000;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .alert-heading {
            font-size: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="login-box">
            <a class="btn btn-outline-primary" href="/"">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <!-- Floating Alert for Failed Session -->
            @if (Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show floating-alert" role="alert">
                    <strong class="alert-heading">Login Gagal!</strong> {{ Session::get('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Floating Alert for Success Session -->
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show floating-alert" role="alert">
                    <strong class="alert-heading">Berhasil!</strong> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="text-center mb-4" style="color: #8A7FCB;">LOGIN</h2>

            <form action="{{ route('postLogin') }}" method="POST" id="login-form" style="margin-bottom:20px">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required
                        value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group form-button">
                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                    <input type="submit" name="signin" id="signin" class="btn login-btn w-100 form-submit"
                        value="Log in" />
                </div>

            </form>
            <div class="text-center mt-3">
                <small>Belum Punya Akun? <a href="registrasi">Registrasi Sekarang!</a></small>
            </div>
        </div>
    </div>

    <footer>
        <p>©<span>Copyright2024</span><strong class="px-1 sitename">Sipela</strong><span>Teknik
                Informatika</span>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("bi-eye");
                toggleIcon.classList.add("bi-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("bi-eye-slash");
                toggleIcon.classList.add("bi-eye");
            }
        }
    </script>


</body>

</html>
