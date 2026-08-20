<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Bio Orbit Drive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #0f0c29 !important;
            background-image: 
                radial-gradient(at 0% 0%, rgba(192, 132, 252, 0.25) 0px, transparent 50%), 
                radial-gradient(at 100% 100%, rgba(59, 130, 246, 0.2) 0px, transparent 50%),
                linear-gradient(135deg, #050515 0%, #100b26 40%, #1a103c 100%) !important;
            background-attachment: fixed;
            color: white !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .register-box {
            background: rgba(255, 255, 255, 0.04) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            border-radius: 12px;
            padding: 12px 15px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: #c084fc !important;
            box-shadow: 0 0 15px rgba(192, 132, 252, 0.3) !important;
            color: white !important;
        }

        .btn-register {
            background: #c084fc;
            color: #0f0c29;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            padding: 12px;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #a855f7;
            box-shadow: 0 0 20px rgba(192, 132, 252, 0.5);
            color: #0f0c29;
        }
    </style>
</head>
<body>

<div class="register-box">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: #c084fc; text-shadow: 0 0 15px rgba(192,132,252,0.3); margin-bottom: 5px;">Bio Orbit Drive</h2>
        <p class="text-white-50 small">Buat akun baru untuk mulai sewa mobil</p>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger bg-danger text-white border-0 small mb-4 shadow" style="border-radius: 12px; padding: 12px 15px; background: rgba(220, 53, 69, 0.2) !important; backdrop-filter: blur(10px); border: 1px solid rgba(220, 53, 69, 0.3) !important;">
            <div class="fw-bold mb-1"><i class="fa-solid fa-triangle-exclamation me-2"></i> Gagal Daftar, Bro:</div>
            <ul class="mb-0 ps-3 small text-white-50">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label text-white-50 small fw-semibold">NAMA LENGKAP</label>
            <input type="text" name="name" class="form-control" placeholder="Nama Anda" value="{{ old('name') }}" required autocomplete="off">
        </div>

        <div class="mb-3">
            <label class="form-label text-white-50 small fw-semibold">EMAIL ADDRESS</label>
            <input type="email" name="email" class="form-control" placeholder="user@gmail.com" value="{{ old('email') }}" required autocomplete="off">
        </div>

        <div class="mb-4">
            <label class="form-label text-white-50 small fw-semibold">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="Min. 6 Karakter" required>
        </div>

        <button type="submit" class="btn btn-register w-100 mb-3">Daftar Sekarang</button>
        
        <div class="text-center">
            <p class="small text-white-50 mb-0">Sudah punya akun? <a href="/login" style="color: #c084fc; text-decoration: none; font-weight: 600;">Masuk di sini</a></p>
        </div>
    </form>
</div>

</body>
</html>