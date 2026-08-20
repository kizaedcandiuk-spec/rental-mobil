<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sewa Mobil - Aesthetic Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #311042 100%);
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --neon-cyan: #06b6d4;
            --neon-emerald: #10b981;
            --text-muted: #94a3b8;
        }

        body {
            background: var(--bg-gradient);
            color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            padding: 2.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(6, 182, 212, 0.2);
            box-shadow: 0 25px 50px rgba(6, 182, 212, 0.1);
        }

        .car-badge {
            background: rgba(6, 182, 212, 0.15);
            color: var(--neon-cyan);
            padding: 6px 16px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            display: inline-block;
            border: 1px solid rgba(6, 182, 212, 0.2);
        }

        .price-tag {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--neon-emerald);
            text-shadow: 0 0 10px rgba(16, 185, 129, 0.2);
        }

        .form-label {
            color: #cbd5e1;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 8px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .input-group-text-custom {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--glass-border);
            border-right: none;
            color: var(--text-muted);
            border-radius: 12px 0 0 12px;
            width: 45px;
            justify-content: center;
        }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid var(--glass-border) !important;
            color: #f8fafc !important;
            border-radius: 0 12px 12px 0 !important;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            background: rgba(255, 255, 255, 0.05) !important;
            border-color: var(--neon-cyan) !important;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.15) !important;
        }

        /* Styling buat kalender agar tetap aesthetic */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            opacity: 0.5;
            cursor: pointer;
        }

        .invalid-feedback {
            color: #f87171;
            font-size: 0.85rem;
            margin-top: 6px;
            font-weight: 500;
        }

        .btn-submit {
            background: linear-gradient(90deg, #06b6d4, #3b82f6);
            border: none;
            color: #ffffff;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(6, 182, 212, 0.5);
            filter: brightness(1.1);
        }

        .btn-cancel {
            background: transparent;
            border: 1px solid var(--glass-border);
            color: #cbd5e1;
            padding: 12px;
            border-radius: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #ffffff;
            border-color: #cbd5e1;
        }

        .divider {
            height: 1px;
            background: var(--glass-border);
            margin: 2rem 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-10">
            <div class="glass-card">
                
                <div class="text-center mb-4">
                    <div class="mb-2">
                        <span class="car-badge">
                            <i class="fa-solid fa-car-side me-2"></i>{{ $car->nama_mobil }}
                        </span>
                    </div>
                    <div class="price-tag mt-3">
                        Rp{{ number_format($car->harga_sewa, 0, ',', '.') }} <span style="font-size: 0.9rem; font-weight: 400; color: var(--text-muted)">/ Hari</span>
                    </div>
                </div>

                <div class="divider"></div>

                <form action="/cars/{{ $car->id }}/rent" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" 
                                   class="form-control form-control-custom @error('nama_peminjam') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('nama_peminjam') }}" autocomplete="off" required>
                        </div>
                        @error('nama_peminjam')
                            <div class="invalid-feedback"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">
                                <i class="fa-solid fa-calendar-plus"></i>
                            </span>
                            <input type="date" name="tgl_pinjam" id="tgl_pinjam" 
                                   class="form-control form-control-custom @error('tgl_pinjam') is-invalid @enderror" 
                                   min="{{ date('Y-m-d') }}"
                                   value="{{ old('tgl_pinjam') }}" required>
                        </div>
                        @error('tgl_pinjam')
                            <div class="invalid-feedback"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <div class="input-group">
                            <span class="input-group-text input-group-text-custom">
                                <i class="fa-solid fa-calendar-check"></i>
                            </span>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" 
                                   class="form-control form-control-custom @error('tgl_kembali') is-invalid @enderror" 
                                   value="{{ old('tgl_kembali') }}" required>
                        </div>
                        @error('tgl_kembali')
                            <div class="invalid-feedback"><i class="fa-solid fa-circle-exclamation me-1"></i>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="divider"></div>

                    <div class="d-grid gap-3">
                        <button type="submit" class="btn btn-submit">
                            <i class="fa-solid fa-paper-plane me-2"></i>Konfirmasi Sewa Sekarang
                        </button>
                        <a href="/cars" class="btn btn-cancel text-center">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    // Logic Aesthetic: Supaya user gak bisa pilih tanggal kembali sebelum tanggal pinjam
    const tglPinjam = document.getElementById('tgl_pinjam');
    const tglKembali = document.getElementById('tgl_kembali');

    tglPinjam.addEventListener('change', function() {
        if (this.value) {
            // Tanggal kembali minimal adalah H+1 dari tanggal pinjam
            let nextDay = new Date(this.value);
            nextDay.setDate(nextDay.getDate() + 1);
            
            // Format ke YYYY-MM-DD
            let minDate = nextDay.toISOString().split('T')[0];
            tglKembali.min = minDate;
            
            // Kalau tgl kembali yang dipilih sebelumnya lebih kecil, reset
            if(tglKembali.value && tglKembali.value < minDate){
                tglKembali.value = minDate;
            }
        }
    });
</script>

</body>
</html>