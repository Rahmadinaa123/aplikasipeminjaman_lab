<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .container {
            min-height: 100vh;
            /* Full viewport height */
            padding-bottom: 50px;
            /* Space for the footer */
            box-sizing: border-box;
        }

        footer {
            position: relative;
            text-align: center;
            bottom: 0;
            padding: 10px width: 100%;
            height: 50px;
            background-color: #56bae4;
            /* Adjust the height */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    @include('layouts.mahasiswa.navbar')

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('konten')
    </div>

    @include('layouts.mahasiswa.footer')
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
    function confirmLogout() {
        if (confirm("Apakah Anda yakin ingin logout?")) {
            document.getElementById('logout-form').submit();
        }
    }
</script>

</html>
