<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Sewa Mobil - Sewa Mobil Gacor</title>
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

        /* PANEL UTAMA SEBELAH KANAN */
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
            color: #a855f7 !important; 
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1.2rem 1rem;
            border-bottom: 1px solid var(--glass-border) !important;
        }

        .table-custom td {
            background: transparent !important;
            padding: 1.2rem 1rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04) !important;
            color: #e2e8f0;
        }

        /* Tombol Kembali ke Armada */
        .btn-back-armada {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: #cbd5e1;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 12px;
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .btn-back-armada:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Tombol Balikin Mobil */
        .btn-return-trans {
            background: rgba(6, 182, 212, 0.15);
            border: 1px solid rgba(6, 182, 212, 0.3);
            color: #22d3ee;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-return-trans:hover {
            background: rgba(6, 182, 212, 0.3);
            color: #38bdf8;
            transform: translateY(-1px);
        }

        /* Tombol Hapus Transaksi */
        .btn-delete-trans {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-delete-trans:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            transform: translateY(-1px);
        }

        /* Tombol Bayar Sekarang (User) */
        .btn-pay-trans {
            background: rgba(234, 179, 8, 0.15);
            border: 1px solid rgba(234, 179, 8, 0.3);
            color: #facc15;
            font-size: 0.8rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-pay-trans:hover {
            background: rgba(234, 179, 8, 0.3);
            color: #fef08a;
            transform: translateY(-1px);
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
            <small class="text-muted d-block mt-1">{{ auth()->user()->role == 'admin' ? 'SuperAdmin Panel' : 'User Panel' }}</small>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="/dashboard"><i class="fa-solid fa-chart-pie"></i>Dashboard</a>
            </li>

            <div class="menu-category">Manajemen Armada</div>
            <li>
                <a href="/cars"><i class="fa-solid fa-car"></i>Daftar Mobil</a>
            </li>
            
            <!-- ================= KHUSUS ADMIN ================= -->
            @if(auth()->user()->role == 'admin')
            <li>
                <a href="/cars/create"><i class="fa-solid fa-plus-circle"></i>Tambah Mobil</a>
            </li>
            @endif

            <div class="menu-category">Transaksi & Keuangan</div>
            <li class="active">
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
                    <h2 class="fw-bold m-0">Riwayat Transaksi</h2>
                    <p class="text-muted m-0 small">Pantau log data penyewaan mobil yang sudah terdaftar di sistem</p>
                </div>
                <!-- Tombol Kembali ke Armada -->
                <a href="/cars" class="btn btn-back-armada">
                    Kembali ke Armada
                </a>
            </div>

            <!-- CARD UTAMA GLASSMORPHISM -->
            <div class="glass-card">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <span style="width: 4px; height: 22px; background: var(--neon-purple); display: inline-block; border-radius: 2px;"></span>
                    <h5 class="fw-bold m-0" style="letter-spacing: 0.5px;">RIWAYAT SEWA MOBIL</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th>Pengenal</th>
                                <th>Peminjam</th>
                                <th>Mobil</th>
                                <th>Durasi</th>
                                <th>Harga Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $index => $transaction)
                            <tr>
                                <!-- PENGENAL (Nomor urut) -->
                                <td class="text-muted">{{ $index + 1 }}</td>
                                
                                <!-- PEMINJAM -->
                                <td class="fw-bold text-white">{{ $transaction->nama_peminjam }}</td>
                                
                                <!-- MOBIL -->
                                <td>{{ $transaction->car->nama_mobil ?? 'Mobil Dihapus' }}</td>
                                
                                <!-- DURASI -->
                                <td>{{ $transaction->durasi_sewa }} Hari</td>
                                
                                <!-- HARGA TOTAL -->
                                <td class="text-success fw-bold">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                                
                                <!-- STATUS -->
                                <td>
                                    @if($transaction->status_pembayaran == 'lunas' || $transaction->status_pembayaran == 'Lunas')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>
                                
                                <!-- AKSI (LOGIKA DINAMIS ADMIN VS USER) -->
                                <td>
                                    <div class="d-flex gap-2 justify-content-center align-items-center">
                                        
                                        <!-- ================= JIKA LOGIN SEBAGAI ADMIN ================= -->
                                        @if(auth()->user()->role == 'admin')
                                            
                                            <!-- Tombol Balikin: Hanya muncul kalau Lunas, Status mobil masih 'Disewa', dan Masa sewa sudah Habis -->
                                            @if(
                                                ($transaction->status_pembayaran == 'lunas' || $transaction->status_pembayaran == 'Lunas') && 
                                                optional($transaction->car)->status == 'Disewa' && 
                                                \Carbon\Carbon::now()->startOfDay()->gte(\Carbon\Carbon::parse($transaction->tgl_kembali)->startOfDay())
                                            )
                                                <form action="/transaction/{{ $transaction->id }}/return" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-return-trans">
                                                        <i class="fa-solid fa-car-side me-1"></i> Balikin
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Tombol Hapus: Selalu muncul untuk Admin -->
                                            <form action="/transaction/{{ $transaction->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-delete-trans">
                                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                                </button>
                                            </form>

                                        <!-- ================= JIKA LOGIN SEBAGAI USER ================= -->
                                        @else
                                            
                                            <!-- Tombol Bayar Sekarang: Hanya muncul jika status masih Pending -->
                                            @if($transaction->status_pembayaran == 'pending' || $transaction->status_pembayaran == 'Pending')
                                                <a href="/transaction/{{ $transaction->id }}/payment" class="btn btn-pay-trans">
                                                    <i class="fa-solid fa-money-bill-wave me-1"></i> Bayar Sekarang
                                                </a>
                                            @else
                                                <span class="text-muted small"><i class="fa-solid fa-circle-check text-success me-1"></i> Selesai</span>
                                            @endif

                                        @endif

                                    </div>
                                </td>
                            </tr>
                            @endforeach
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