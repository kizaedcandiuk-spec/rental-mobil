<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil - Sewa Mobil Gacor</title>
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #090d16 0%, #111827 50%, #1f1135 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.07);
            --neon-purple: #a855f7;
            --neon-cyan: #06b6d4;
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

        /* PANEL KANAN & FORM INPUT STYLE */
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
            font-size: 0.9rem;
            font-weight: 600;
            color: #e2e8f0;
            margin-bottom: 0.5rem;
        }

        /* Form styling transparan custom */
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
            border-radius: 10px;
            padding: 0.65rem 1rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.07) !important;
            border-color: var(--neon-cyan) !important;
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.2) !important;
        }

        .form-select option {
            background: #111827;
            color: #fff;
        }

        .btn-submit {
            background: linear-gradient(90deg, #a855f7, #06b6d4);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(6, 182, 212, 0.4);
            filter: brightness(1.1);
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
            <li>
                <a href="/cars"><i class="fa-solid fa-car"></i>Daftar Mobil</a>
            </li>
            <li class="active">
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
                <p class="text-muted m-0 small">Tambahkan unit armada terbaru lu ke dalam sistem web</p>
            </div>

            <!-- BOX FORM DENGAN EFFECT GLASSMORPHISM -->
            <div class="glass-card">
                <h5 class="fw-bold text-info mb-4"><i class="fa-solid fa-folder-plus me-2"></i>Formulir Tambah Unit Baru</h5>
                
                <!-- ACTION FORM DIARAHKAN KE ROUTE STORE -->
                <form action="/cars/store" method="POST">
                    @csrf
                    
                    <div class="row">
                        <!-- Input Nama Mobil -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" name="nama_mobil" class="form-control" placeholder="Contoh: Honda Civic Turbo" required>
                        </div>

                        <!-- Input Merek / Brand -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Merek</label>
                            <input type="text" name="merk" class="form-control" placeholder="Contoh: Honda" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input Nopol / Plat Nomor -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Plat Nomor</label>
                            <input type="text" name="nomer_plat" class="form-control" placeholder="Contoh: D 1234 GCR" required>
                        </div>

                        <!-- Input Harga Sewa Per Hari -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Sewa / Hari (Rp)</label>
                            <input type="number" name="harga_sewa" class="form-control" placeholder="Contoh: 500000" required>
                        </div>
                    </div>

                    <!-- Pilihan Status Awal Mobil -->
                    <div class="mb-4">
                        <label class="form-label">Status Unit</label>
                        <select name="status" class="form-select" required>
                            <option value="Tersedia">Tersedia (Ready Utk Disewa)</option>
                            <option value="Disewa">Sedang Disewa</option>
                            <option value="Servis">Dalam Perawatan / Bengkel</option>
                        </select>
                    </div>

                    <hr style="border-color: var(--glass-border);" class="my-4">

                    <!-- Tombol Action -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="/cars" class="btn btn-outline-secondary px-4 rounded-3 text-white border-secondary">Batal</a>
                        <button type="submit" class="btn btn-submit px-4">
                            <i class="fa-solid fa-save me-2"></i>Simpan Unit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>