<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }

        .centered-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
            text-align: center;
        }

        .logo-img {
            max-width: 250px;
            width: 250px;
            height: auto;
        }

        .btn-custom-green {
            background-color: #01923F;
            color: white;
            border: none;
        }

        .btn-custom-green:hover {
            background-color: #017a35;
        }
    </style>
</head>
<body>
    <div class="centered-container">
        <!-- Logo Sekolah -->
        <a href="#">
            <img src="{{ asset('/images/logo/logo_sekolah.png') }}" alt="Logo Sekolah" class="logo-img">
        </a>

        <!-- Tulisan Sambutan -->
        <h2>SELAMAT DATANG DI WEB UJIAN CBT <br>
            MADRASAH IBTIDAIYAH ISLAMIYAH GUPPI CILENGKRANG</h2>

        <!-- Tombol Mulai -->
         @role('teacher')
            <a href="{{ route('dashboard.courses.index')}}" class="btn btn-custom-green btn-lg">Masuk</a>
        @else
            <a href="{{ route('dashboard.learning.index')}}" class="btn btn-custom-green btn-lg">Masuk</a>
        @endrole
    </div>
</body>
</html>
