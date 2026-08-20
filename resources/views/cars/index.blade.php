<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Armada Mobil - Sewa Mobil Gacor</title>
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

        /* PANEL KANAN & TABEL STYLE */
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
            padding: 2rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        /* Styling Tabel Transparan */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--glass-border);
        }

        .table-custom {
            margin-bottom: 0;
            background: transparent !important;
            color: #f8fafc !important;
        }

        .table-custom th {
            background: rgba(255, 255, 255, 0.05) !important;
            color: var(--neon-cyan) !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border-bottom: 1px solid var(--glass-border) !important;
        }

        .table-custom td {
            background: transparent !important;
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04) !important;
            color: #e2e8f0;
        }

        /* Tombol Tambah Baru */
        .btn-add-new {
            background: linear-gradient(90deg, #06b6d4, #0891b2);
            color: white;
            font-weight: 600;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }
        .btn-add-new:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.4);
            color: white;
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
            
            <!-- ================= KHUSUS ADMIN ================= -->
            @if(auth()->user()->role == 'admin')
            <li>
                <a href="/cars/create"><i class="fa-solid fa-plus-circle"></i>Tambah Mobil</a>
            </li>
            @endif

            <div class="menu-category">Transaksi & Keuangan</div>
            <li>
                <a href="/transaction"><i class="fa-solid fa-receipt"></i>Riwayat Transaksi</a>
            </li>
            
            <!-- ================= KHUSUS ADMIN ================= -->
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

    <!-- PANEL UTAMA SEBELAH KANAN -->
    <main class="main-content">
        <div class="container-fluid p-0">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2>Kelola Data Mobil</h2>
                    <small class="text-muted">Lihat atau pantau status ketersediaan armada mobil rental</small>
                </div>
                
                <!-- HANYA ADMIN YANG BISA LIHAT TOMBOL INI -->
                @if(auth()->user()->role == 'admin')
                    <a href="/cars/create" class="btn btn-primary">+ Tambah Mobil Baru</a>
                @endif
            </div>

            <!-- CARD UTAMA TEMPAT DATA TABEL -->
            <div class="glass-card">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <i class="fa-solid fa-list-check text-info fs-5"></i>
                    <h5 class="fw-bold m-0" style="letter-spacing: 0.5px;">DAFTAR ARMADA MOBIL</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>Nama Mobil</th>
                                <th>Merk</th>
                                <th>No. Plat</th>
                                <th>Harga Sewa / Hari</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($cars as $car)
                        <tr>
                            <!-- 1. NAMA MOBIL -->
                            <td class="fw-bold text-white">{{ $car->nama_mobil }}</td>
                            
                            <!-- 2. MERK -->
                            <td>{{ $car->merk }}</td>
                            
                            <!-- 3. NO. PLAT -->
                            <td>
                                <span class="badge bg-secondary" style="letter-spacing: 0.5px;">
                                    {{ $car->plat_nomor ?? $car->no_plat ?? $car->plat ?? $car->nomer_plat ?? 'Gak Ketemu' }}
                                </span>
                            </td>
                            
                            <!-- 4. HARGA SEWA / HARI -->
                            <td class="text-success fw-bold">Rp {{ number_format($car->harga_sewa, 0, ',', '.') }}</td>
                            
                            <!-- 5. STATUS -->
                            <td>
                                @if($car->status == 'tersedia' || $car->status == 'Tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @else
                                    <span class="badge bg-danger">Disewa</span>
                                @endif
                            </td>
                            
                            <!-- 6. AKSI -->
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <!-- Perbaikan Route Sewa + Logika Status Ketersediaan -->
                                    @if($car->status == 'tersedia' || $car->status == 'Tersedia')
                                        <a href="/transaction/create?car_id={{ $car->id }}" class="btn btn-sm btn-success">
                                            <i class="fa-solid fa-key me-1"></i> Sewa
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-secondary" disabled>
                                            <i class="fa-solid fa-lock me-1"></i> Disewa
                                        </button>
                                    @endif
                                    
                                    <!-- Fitur khusus admin (Edit & Hapus) -->
                                    @if(auth()->user()->role == 'admin')
                                        <a href="/cars/{{ $car->id }}/edit" class="btn btn-sm btn-warning text-dark fw-bold">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>
                                        <form action="/cars/{{ $car->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin dihapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Data armada mobil belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>