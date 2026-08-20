<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bio Orbit Drive - Sewa Mobil Gacor</title>
    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0c1b 0%, #1a152e 50%, #251c3d 100%);
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* NAVBAR ATAS PERSIS SPERTI MARKETPLACE */
        .navbar-top {
            background: rgba(26, 21, 44, 0.65);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-logo {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-logo i {
            color: #a873ff;
        }

        .nav-auth {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .btn-daftar {
            color: #c096ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s;
        }

        .btn-daftar:hover {
            color: #ffffff;
        }

        .btn-login {
            background: rgba(168, 115, 255, 0.2);
            border: 1px solid #a873ff;
            color: #ffffff;
            padding: 8px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #a873ff;
            box-shadow: 0 0 15px rgba(168, 115, 255, 0.4);
            color: #110d21;
        }

        /* HERO SECTION */
        .hero-section {
            padding: 150px 50px 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 50px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(120deg, #ffffff, #c096ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-section p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.1rem;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* PILIHAN ARMADA UNTUK UMUM */
        .katalog-title {
            font-size: 1.8rem;
            margin-bottom: 30px;
            text-align: left;
            border-left: 4px solid #a873ff;
            padding-left: 15px;
        }

        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .car-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 25px;
            text-align: left;
            transition: transform 0.3s, border 0.3s;
        }

        .car-card:hover {
            transform: translateY(-5px);
            border-color: rgba(168, 115, 255, 0.3);
        }

        .car-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .car-price {
            color: #a873ff;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .btn-sewa-umum {
            display: block;
            background: #a873ff;
            color: #110d21;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn-sewa-umum:hover {
            background: #b98fff;
        }
    </style>
</head>
<body>

    <!-- NAVBAR ATAS -->
    <nav class="navbar-top">
        <a href="/" class="nav-logo">
            <i class="fa-solid fa-car-side"></i> Bio Orbit Drive
        </a>
        <div class="nav-auth">
            <a href="/register" class="btn-daftar">Daftar</a>
            <a href="/login" class="btn-login">Log In</a>
        </div>
    </nav>

    <!-- UTAMA -->
    <div class="hero-section">
        <div class="glass-card">
            <h1>Selamat Datang di Bio Orbit Drive</h1>
            <p>Sewa mobil praktis dengan layanan 24 jam dengan kualitas armada terbaik. Silahkan Daftar/Log In terlebih dahulu untuk melakukan pemesanan.</p>
            
            <h3 class="katalog-title">Armada Tersedia</h3>
            
            <!-- Simulasi Tampilan Daftar Mobil untuk Umum -->
            <div class="car-grid">
                <div class="car-card">
                    <div class="car-name">Avanza Veloz 2023</div>
                    <div class="car-price">Rp 350.000 / Hari</div>
                    <a href="/login" class="btn-sewa-umum">Sewa Sekarang</a>
                </div>
                <div class="car-card">
                    <div class="car-name">Innova Reborn</div>
                    <div class="car-price">Rp 500.000 / Hari</div>
                    <a href="/login" class="btn-sewa-umum">Sewa Sekarang</a>
                </div>
                <div class="car-card">
                    <div class="car-name">Honda Brio Facelift</div>
                    <div class="car-price">Rp 300.000 / Hari</div>
                    <a href="/login" class="btn-sewa-umum">Sewa Sekarang</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>