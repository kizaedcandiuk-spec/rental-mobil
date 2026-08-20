<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil - Sewa Mobil Gacor</title>
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #090d16 0%, #111827 50%, #1f1135 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.07);
            --neon-purple: #a855f7;
            --neon-cyan: #06b6d4;
            --text-muted: #94a3b8 !important; 
        }

        .text-muted, 
        small.text-muted,
        .stat-card small,
        .quick-card small,
        .form-label {
            color: #94a3b8 !important;
        }

        .stat-card span.text-muted,
        .stat-card .text-muted {
            color: #cbd5e1 !important;
        }

        body {
            background: var(--bg-gradient);
            color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        .sidebar {
            width: 280px;
            min-width: 280px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-right: 1px solid var(--glass-border);
            min-height: 100vh;
            padding: 2rem 1.2rem;
            display: flex;
            flex-direction: column;
        }

        .brand-section {
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--glass-border);
            margin-bottom: 1.5rem;
        }

        .brand-title {
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            background: linear-gradient(to right, #c084fc, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .menu-category {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            padding-left: 0.5rem;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            margin-bottom: 0.4rem;
        }

        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 0.8rem 1rem;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .nav-menu a i {
            margin-right: 1rem;
            font-size: 1.1rem;
            width: 24px;
            color: var(--text-muted);
        }

        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
        }

        .nav-menu li.active a {
            background: rgba(168, 85, 247, 0.15);
            border: 1px solid rgba(168, 85, 247, 0.25);
            color: #ffffff;
        }

        .nav-menu li.active a i {
            color: var(--neon-purple);
        }

        .main-content {
            width: 100%;
            padding: 2.5rem;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.07) !important;
            border-color: var(--neon-purple) !important;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.2) !important;
        }

        .form-select option {
            background: #111827;
            color: #fff;
        }

        .btn-update {
            background: linear-gradient(90deg, #a855f7, #7e22ce);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(168, 85, 247, 0.4);
            filter: brightness(1.1);
            color: white;
        }

        .btn-cancel {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: #cbd5e1;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- SIDEBAR LEFT -->
    <nav class="sidebar">
        <div class="brand-section">
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-car-side fs-4 text-info"></i>
                <div class="brand-title">GACOR RENTAL</div>
            </div>
            <small class="text-muted d-block mt-1">SuperAdmin Panel</small>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="/dashboard"><i class="fa-solid fa-chart-pie"></i>Dashboard</a>
            </li>

            <div class="menu-category">Manajemen Armada</div>
            <li class="active">
                <a href="/cars"><i class="fa-solid fa-car"></i>Daftar Mobil</a>
            </li>
            <li>
                <a href="/cars/create"><i class="fa-solid fa-plus-circle"></i>Tambah Mobil</a>
            </li>

            <div class="menu-category">Transaksi & Keuangan</div>
            <li>
                <a href="/transaction"><i class="fa-solid fa-receipt"></i>Riwayat Transaksi</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-wallet"></i>Laporan Omzet</a>
            </li>

            <div class="menu-category">Lainnya</div>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket text-danger"></i>Keluar
                </a>
            </li>
        </ul>
        
        <form id="logout-form" action="/logout" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <!-- MAIN CONTENT RIGHT -->
    <main class="main-content">
        <div class="container-fluid p-0">
            
            <div class="mb-4">
                <h2 class="fw-bold m-0">Kelola Data Mobil</h2>
                <p class="text-muted m-0 small">Perbarui data spesifikasi unit armada sewa mobil lu bro</p>
            </div>

            <!-- BOX FORM EDIT GLASSMORPHISM -->
            <div class="glass-card">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span style="width: 4px; height: 24px; background: var(--neon-purple); display: inline-block; border-radius: 2px;"></span>
                    <h5 class="fw-bold m-0" style="letter-spacing: 0.5px;">EDIT DATA MOBIL</h5>
                </div>
                
                <!-- Tampilkan Error Validasi kalau ada -->
                @if ($errors->any())
                    <div class="alert alert-danger bg-danger text-white border-0 mb-4" style="border-radius: 10px;">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Form Method PUT khas Laravel Update -->
                <form action="/cars/{{ $car->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Input Nama Mobil -->
                    <div class="mb-4">
                        <label class="form-label">Nama Mobil</label>
                        <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil', $car->nama_mobil) }}" required>
                    </div>

                    <div class="row">
                        <!-- Input Merek -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Merk</label>
                            <input type="text" name="merk" class="form-control" value="{{ old('merk', $car->merk) }}" required>
                        </div>

                        <!-- Input Plat Nomor -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">No. Plat</label>
                            <input type="text" name="nomer_plat" class="form-control" value="{{ old('nomer_plat', $car->nomer_plat) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Harga Sewa -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Harga Sewa / Hari</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0 text-muted style-span" style="border: 1px solid rgba(255,255,255,0.1); border-radius: 10px 0 0 10px;">Rp</span>
                                <input type="number" name="harga_sewa" class="form-control border-start-0" value="{{ old('harga_sewa', $car->harga_sewa) }}" style="border-radius: 0 10px 10px 0;" required>
                            </div>
                        </div>

                        <!-- Pilihan Status Unit -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Status Unit</label>
                            <select name="status" class="form-select" required>
                                <option value="Tersedia" {{ old('status', $car->status) == 'Tersedia' ? 'selected' : '' }}>🟢 Tersedia</option>
                                <option value="Disewa" {{ old('status', $car->status) == 'Disewa' ? 'selected' : '' }}>🔴 Sedang Disewa</option>
                                <option value="Servis" {{ old('status', $car->status) == 'Servis' ? 'selected' : '' }}>🟡 Dalam Perawatan</option>
                            </select>
                        </div>
                    </div>

                    <hr style="border-color: var(--glass-border);" class="my-4">

                    <!-- Tombol Form Action -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-update flex-grow-1">
                           PERBARUI DATA
                        </button>
                        <a href="/cars" class="btn btn-cancel">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>