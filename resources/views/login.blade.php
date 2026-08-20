<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Penyewaan Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            background-color: #0f0c29 !important;
            background-image: 
                radial-gradient(at 0% 0%, rgba(0, 68, 255, 0.25) 0px, transparent 50%), 
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

        .login-box {
            background: rgba(255, 255, 255, 0.04) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px; /* Lebar kotak login proporsional */
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

        .btn-login {
            background: #2bff00;
            color: #0f0c29;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            padding: 12px;
            transition: 0.3s;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            background: #a855f7;
            box-shadow: 0 0 20px rgba(192, 132, 252, 0.5);
            color: #0f0c29;
        }
    </style>
</head>
<body>

<div class="login-box">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: #c084fc; text-shadow: 0 0 15px rgba(192,132,252,0.3); margin-bottom: 5px;">Penyewaan Mobil</h2>
        <p class="text-white-50 small">Silahkan masuk ke akun Admin / User Anda</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger bg-danger text-white border-0 small mb-3" style="border-radius: 10px; padding: 10px 15px;">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label text-white-50 small fw-semibold" style="letter-spacing: 0.5px;">EMAIL ADDRESS</label>
            <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required autocomplete="off">
        </div>

        <div class="mb-4">
            <label class="form-label text-white-50 small fw-semibold" style="letter-spacing: 0.5px;">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-login w-100 mb-2">Sign In</button>
    </form>
</div>

</body>
</html>