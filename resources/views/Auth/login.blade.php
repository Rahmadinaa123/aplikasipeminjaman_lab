<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
    body {
        background-color: #B3C7E6;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-container {
        display: flex;
        width: 80%;
        max-width: 1000px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .login-image {
        width: 50%;
        background: url('assets/img/TI.jpeg') no-repeat center center;
        background-size: cover;
    }

    .login-box {
        width: 50%;
        padding: 40px;
    }

    .login-btn {
        background-color: #4F54F1;
        color: white;
    }

    .login-btn:hover {
        background-color: #4c8bf5;
        color: white;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-box">
            <h2 class="text-center mb-4" style="color: #8A7FCB;">LOGIN</h2>
            <form action="{{ route('postLogin') }}" method="POST" id="login-form">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
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
                </div>
                <button type="submit" class="btn login-btn w-100">Log in</button>
            </form>
            <div class="text-center mt-3">
                <small>Belum Punya Akun? <a href="registrasi">Registrasi Sekarang!</a></small>
            </div>
        </div>
    </div>
    <script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
    </script>
</body>

</html>