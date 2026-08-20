<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        .navbar-dark .nav-link.active {
            color: #c084fc !important;
            font-weight: bold;
        }

        /* Tombol Logout */
        .btn-logout-custom {
            border: 1px solid rgba(220, 53, 69, 0.4);
            color: #dc3545;
            background: rgba(220, 53, 69, 0.05);
            transition: 0.2s;
            font-size: 0.85rem;
            padding: 5px 12px;
            border-radius: 8px;
        }

        .btn-logout-custom:hover {
            background: #dc3545;
            color: white;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
        }

        /* Tombol Daftar (Glassmorphism Style) biar pas di-hover tulisannya ga ilang putih */
        .btn-daftar-custom {
            border: 1px solid rgba(192, 132, 252, 0.4);
            color: #c084fc;
            background: rgba(192, 132, 252, 0.05);
            transition: 0.2s;
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-daftar-custom:hover {
            background: #c084fc;
            color: #0f0c29 !important; /* Teks berubah gelap pas disorot biar kebaca jelas */
            box-shadow: 0 0 15px rgba(192, 132, 252, 0.4);
        }
   </style>
</head>
<body class="bg-light">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">🚗 Rental Mobil Gacor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    
                    @auth
                    <!-- ================= MENU NAVBAR ATAS (BISA DIAKSES USER & ADMIN) ================= -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('cars') ? 'active' : '' }}" href="/cars">Daftar Mobil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('transaction') || Request::is('riwayat') ? 'active' : '' }}" href="/transaction">Riwayat Transaksi</a>
                    </li>

                    <!-- GREETING & TOMBOL LOGOUT -->
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0 text-white-50 small">
                        Halo, <span class="text-white fw-bold">{{ auth()->user()->name }}</span> 
                        <span class="badge bg-secondary ms-1" style="font-size: 0.7rem;">{{ strtoupper(auth()->user()->role) }}</span>
                    </li>

                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-logout-custom">
                                <i class="fa-solid fa-right-from-bracket me-1"></i> Keluar
                            </button>
                        </form>
                    </li>
                    @endauth

                    @guest
                    <!-- ================= MENU JIKA BELUM LOGIN (GUEST) ================= -->
                    <li class="nav-item me-2">
                        <a href="/register" class="btn-daftar-custom">
                            <i class="fa-solid fa-user-plus me-1"></i> Daftar
                        </a>
                    </li>
                    <li class="nav-item mt-2 mt-lg-0">
                        <a href="/login" class="btn btn-sm text-white px-3" style="background: #c084fc; border-radius: 8px; font-weight: 600; padding: 6px 15px;">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk
                        </a>
                    </li>
                    @endguest
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- ================= FIX BANGET DI SINI: STRUKTUR SIDEBAR KIRI LU BRO ================= -->
    @auth
    <div class="sidebar-left-panel">
        <!-- 1. DASHBOARD -->
        <a href="/dashboard" class="sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-gauge me-2"></i> Dashboard
        </a>

        <!-- 2. DAFTAR MOBIL -->
        <a href="/cars" class="sidebar-link {{ Request::is('cars') ? 'active' : '' }}">
            <i class="fa-solid fa-car me-2"></i> Daftar Mobil
        </a>

        <!-- 3. TOMBOL TAMBAH MOBIL (KHUSUS ADMIN SAJA) -->
        @if(auth()->user()->role == 'admin')
        <a href="/cars/create" class="sidebar-link {{ Request::is('cars/create') ? 'active' : '' }}">
            <i class="fa-solid fa-circle-plus me-2"></i> Tambah Mobil
        </a>
        @endif

        <!-- 4. RIWAYAT TRANSAKSI (USER & ADMIN BISA LIHAT) -->
        <a href="/transaction" class="sidebar-link {{ Request::is('transaction') ? 'active' : '' }}">
            <i class="fa-solid fa-file-invoice-dollar me-2"></i> Riwayat Transaksi
        </a>

        <!-- 5. LAPORAN OMZET (KHUSUS ADMIN SAJA) -->
        @if(auth()->user()->role == 'admin')
        <a href="/omzet" class="sidebar-link {{ Request::is('omzet') ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line me-2"></i> Laporan Omzet
        </a>
        @endif
    </div>
    @endauth