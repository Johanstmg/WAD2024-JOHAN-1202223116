<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KUBI ICT')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #DDD0C8;
            color: #00000;
            flex-shrink: 0;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color:   white;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <h4 class="p-3">KUBI ICT</h4>
    <a href="{{ route('dashboard') }}" style="color: #000;">Dashboard</a>
    <a href="{{ route('dosen.index') }}" style="color: #000;">Dosen</a>
    <a href="{{ route('mahasiswa.index') }}" style="color: #000;">Mahasiswa</a>
</div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">@yield('title', 'Hi! 😊')</span>
            </div>
        </nav>

        <div class="row">
    <!-- Jumlah Total Dosen -->
    <div class="col-md-6">
        <div class="card mb-3" style="background-color: #DDD0C8; color: #000;">
            <div class="card-header" style="background-color: #DDD0C8; color: #000; border-bottom: 1px solid #323232;">
                Jumlah Dosen KUBI ICT
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalDosen ?? 0 }}</h5>
            </div>
        </div>
    </div>

    <!-- Jumlah Total Mahasiswa -->
    <div class="col-md-6">
        <div class="card mb-3" style="background-color: #DDD0C8; color: #000;">
            <div class="card-header" style="background-color: #DDD0C8; color: #000; border-bottom: 1px solid #323232;">
                Jumlah Mahasiswa KUBI ICT
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $totalMahasiswa ?? 0 }}</h5>
            </div>
        </div>
    </div>
</div>
            
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
