<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bio Orbit Drive</title>
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
            --text-muted: #94a3b8;
            /* TIMPA GLOBAL UNTUK SEMUA HALAMAN */
            /* Kita paksa warna text-muted jadi abu-abu neon terang yang kontras */
            --text-muted: #94a3b8 !important; 
        }

        /* Fix class text-muted Bootstrap biar gak jadi hitam */
        .text-muted, 
        small.text-muted,
        .stat-card small,
        .quick-card small,
        .form-label {
            color: #94a3b8 !important;
        }

        /* Tambahan biar teks unit (seperti 'Mobil', 'Unit', 'Riwayat') di bawah angka ikut terang */
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

        /* SIDEBAR PANEL KIRI */
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

        /* MAIN CONTENT KANAN */
        .main-content {
            width: 100%;
            padding: 2.5rem;
        }

        /* Hero Welcome Banner */
        .welcome-card {
            background: linear-gradient(100deg, rgba(255, 255, 255, 0.04) 0%, rgba(168, 85, 247, 0.05) 100%);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        }

        .btn-start-rent {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #e2e8f0;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-start-rent:hover {
            background: rgba(168, 85, 247, 0.2);
            border-color: var(--neon-purple);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Mini Stats Cards */
        .stat-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.15);
        }

        .icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1.2rem;
        }

        /* Quick Access Cards */
        .quick-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 1.2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }
        .quick-card:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--neon-cyan);
            transform: scale(1.02);
            color: #fff;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- SIDEBAR PANEL KIRI -->
    <nav class="sidebar">
        <div class="brand-section">
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-car-side fs-4 text-info"></i>
                <div class="brand-title">GACOR RENTAL</div>
            </div>
            <small class="text-muted d-block mt-1">SuperAdmin Panel</small>
        </div>

            <ul class="nav-menu">
            <li class="active"> <!-- di halaman dashboard biasanya li ini yang active -->
                <a href="/dashboard"><i class="fa-solid fa-chart-pie"></i>Dashboard</a>
            </li>

            <div class="menu-category">Manajemen Armada</div>
            <li>
                <a href="/cars"><i class="fa-solid fa-car"></i>Daftar Mobil</a>
            </li>
            
            <!-- ================= HANYA TAMPIL DI ADMIN ================= -->
            @if(auth()->user()->role == 'admin')
            <li>
                <a href="/cars/create"><i class="fa-solid fa-plus-circle"></i>Tambah Mobil</a>
            </li>
            @endif

            <div class="menu-category">Transaksi & Keuangan</div>
            <li>
                <a href="/transaction"><i class="fa-solid fa-receipt"></i>Riwayat Transaksi</a>
            </li>
            
            <!-- ================= HANYA TAMPIL DI ADMIN ================= -->
            @if(auth()->user()->role == 'admin')
            <li>
                <a href="#"><i class="fa-solid fa-wallet"></i>Laporan Omzet</a>
            </li>
            @endif

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

    <!-- MAIN CONTENT UTAMA SEBELAH KANAN -->
    <main class="main-content">
        <div class="container-fluid p-0">
            
            <!-- Hero Welcome Card Banner -->
            <div class="welcome-card mb-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-8">
                        <h1 class="fw-bold mb-2">Selamat Datang di <span style="color: #c084fc;">Bio Orbit Drive</span></h1>
                        <p class="text-light-50 m-0" style="font-size: 0.95rem; max-width: 600px;">
                            Kelola armada, pantau transaksi sewa, dan amankan riwayat transaksi dengan praktis dalam satu manajemen dashboard.
                        </p>
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a href="/cars" class="btn btn-start-rent">
                            <i class="fa-solid fa-car"></i> Mulai Sewa Mobil
                        </a>
                    </div>
                </div>
            </div>

            <!-- ROW STATISTIK UTAMA -->
            <div class="row g-3 mb-4">
                <!-- Total Mobil -->
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="icon-box" style="background: rgba(168, 85, 247, 0.15); color: #c084fc;">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <small class="text-muted d-block text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem;">Armada Total</small>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <h2 class="fw-bold m-0">8</h2>
                            <span class="text-muted small">Mobil</span>
                        </div>
                    </div>
                </div>

                <!-- Tersedia -->
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="icon-box" style="background: rgba(16, 185, 129, 0.15); color: #34d399;">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <small class="text-muted d-block text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem;">Tersedia</small>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <h2 class="fw-bold text-success m-0">8</h2>
                            <span class="text-muted small">Unit</span>
                        </div>
                    </div>
                </div>

                <!-- Sedang Jalan -->
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="icon-box" style="background: rgba(245, 158, 11, 0.15); color: #fbbf24;">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <small class="text-muted d-block text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem;">Sedang Jalan</small>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <h2 class="fw-bold text-warning m-0">0</h2>
                            <span class="text-muted small">Unit</span>
                        </div>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="col-6 col-md-3">
                    <div class="stat-card">
                        <div class="icon-box" style="background: rgba(59, 130, 246, 0.15); color: #60a5fa;">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                        </div>
                        <small class="text-muted d-block text-uppercase fw-bold tracking-wider" style="font-size: 0.75rem;">Total Transaksi</small>
                        <div class="d-flex align-items-baseline gap-2 mt-1">
                            <h2 class="fw-bold text-info m-0">2</h2>
                            <span class="text-muted small">Riwayat</span>
                        </div>
                    </div>
                </div>
            </div>

           <!-- ================= AKSES CEPAT SISTEM ================= -->
        <div class="mt-4">
            <h6 class="text-white fw-bold mb-3" style="letter-spacing: 0.5px; border-left: 3px solid #00cfde; padding-left: 10px;">
                AKSES CEPAT SISTEM
            </h6>

            <div class="row g-3">
                
                <!-- ================= KHUSUS ADMIN SAJA ================= -->
                @if(auth()->user()->role == 'admin')
                    <!-- Tombol Tambah Mobil Baru -->
                    <div class="col-md-4">
                        <a href="/cars/create" class="text-decoration-none">
                            <div class="quick-card d-flex align-items-center p-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; gap: 15px;">
                                <div class="icon-box d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(255, 255, 255, 0.05); border-radius: 8px;">
                                    <i class="fa-solid fa-plus text-muted"></i>
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold m-0" style="font-size: 0.9rem;">Tambah Mobil Baru</h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">Unit input baru ke database</small>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Tombol Riwayat Transaksi -->
                    <div class="col-md-4">
                        <a href="/transaction" class="text-decoration-none">
                            <div class="quick-card d-flex align-items-center p-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; gap: 15px;">
                                <div class="icon-box d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(255, 255, 255, 0.05); border-radius: 8px;">
                                    <i class="fa-solid fa-file-invoice text-muted"></i>
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold m-0" style="font-size: 0.9rem;">Riwayat Transaksi</h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">Cek daftar penyewaan akunmu</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <!-- ================= BISA DIAKSES ADMIN & USER ================= -->
                <!-- Tombol Lihat Katalog Mobil -->
                <div class="col-md-4">
                    <a href="/cars" class="text-decoration-none">
                        <div class="quick-card d-flex align-items-center p-3" style="background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 12px; gap: 15px;">
                            <div class="icon-box d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(255, 255, 255, 0.05); border-radius: 8px;">
                                <i class="fa-solid fa-car text-info"></i>
                            </div>
                            <div>
                                <h6 class="text-white fw-bold m-0" style="font-size: 0.9rem;">Lihat Katalog Mobil</h6>
                                <small class="text-muted" style="font-size: 0.75rem;">Lihat semua status kelayakan kendaraan</small>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>