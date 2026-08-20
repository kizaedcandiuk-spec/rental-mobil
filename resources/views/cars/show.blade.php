<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa Armada - Bio Orbit Drive</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            width: 100%;
            max-width: 750px;
        }

        /* Detail Banner Box */
        .detail-box {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 1.2rem 1.5rem;
        }

        .price-tag {
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.25);
            color: #60a5fa;
            padding: 8px 16px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Form Controls Styling */
        .form-label {
            color: #cbd5e1 !important;
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-control-custom {
            background: rgba(15, 23, 42, 0.4) !important;
            border: 1px solid var(--glass-border) !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            border-color: var(--neon-purple) !important;
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15) !important;
        }

        /* Input Date Accent */
        .form-control-custom::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        /* Buttons */
        .btn-back {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: #cbd5e1;
            font-weight: 500;
            padding: 6px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .btn-submit-rent {
            background: #c084fc;
            color: #110624;
            font-weight: 700;
            border: none;
            padding: 14px;
            border-radius: 14px;
            width: 100%;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-submit-rent:hover {
            background: #b455ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(168, 85, 247, 0.4);
            color: #110624;
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

    <!-- MAIN CONTENT UTAMA SEBELAH KANAN -->
    <main class="main-content">
        <!-- CARD FORM UTAMA GLASSMORPHISM -->
        <div class="glass-card">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center gap-2">
                    <span style="width: 4px; height: 22px; background: var(--neon-purple); display: inline-block; border-radius: 2px;"></span>
                    <h4 class="fw-bold m-0" style="letter-spacing: 0.5px;">FORM SEWA ARMADA</h4>
                </div>
                <a href="/cars" class="btn-back">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Box Detail Mobil Terpilih -->
            <div class="detail-box mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted d-block uppercase fw-bold" style="font-size: 0.75rem;">Mobil yang disewa:</small>
                    <h3 class="fw-bold text-white m-0 mt-1">{{ $car->nama_mobil ?? 'PAJERO' }}</h3>
                </div>
                <div>
                    <div class="price-tag">
                        Rp {{ isset($car->harga) ? number_format($car->harga, 0, ',', '.') : '500.000' }} / Hari
                    </div>
                </div>
            </div>

            <!-- Form Proses Sewa Mobil -->
            <form action="/cars/{{ $car->id ?? 1 }}/rent" method="POST">
                @csrf
                
                <!-- Input Nama Peminjam -->
                <div class="mb-4">
                    <label class="form-label">Nama Lengkap Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control form-control-custom" 
                        value="{{ auth()->user()->name ?? 'admin 1' }}" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Input Tanggal Sewa -->
                <div class="row g-3 mb-5">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Mulai Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control form-control-custom" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Pengembalian</label>
                        <input type="date" name="tgl_kembali" class="form-control form-control-custom" required>
                    </div>
                </div>

                <!-- Tombol Submit Form -->
                <button type="submit" class="btn btn-submit-rent">
                    <i class="fa-solid fa-car"></i> Konfirmasi & Lanjut Bayar
                </button>
            </form>

        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>