<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Pembayaran - Sewa Mobil Gacor</title>
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
            --neon-amber: #f59e0b;
            --text-muted: #94a3b8;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .glass-card {
            background: rgba(30, 27, 75, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            padding: 2.5rem;
            width: 100%;
            max-width: 650px;
        }

        .faktur-header {
            border-bottom: 1px solid var(--glass-border);
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .brand-indicator {
            width: 4px;
            height: 28px;
            background: linear-gradient(#c084fc, #06b6d4);
            border-radius: 2px;
        }

        .method-title {
            color: var(--neon-amber);
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .payment-box {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .custom-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 6px;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 12px;
        }
        .badge-blue { background: #2563eb; color: #fff; }
        .badge-red { background: #dc2626; color: #fff; }

        .method-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .method-item:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--neon-cyan);
        }

        .method-item.active {
            background: rgba(6, 182, 212, 0.15);
            border-color: var(--neon-cyan);
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.2);
        }

        .method-item i {
            font-size: 1.1rem;
            color: var(--text-muted);
        }

        .method-item.active i {
            color: var(--neon-cyan);
        }

        .qris-wrapper {
            background: #ffffff;
            padding: 12px;
            border-radius: 14px;
            display: inline-block;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .qris-img {
            width: 140px;
            height: 140px;
            object-fit: contain;
        }

        .btn-pay-now {
            background: linear-gradient(90deg, #10b981, #059669);
            border: none;
            color: #ffffff;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            width: 100%;
        }

        .btn-pay-now:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(16, 185, 129, 0.5);
            filter: brightness(1.1);
        }

        .btn-later {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }
        .btn-later:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="glass-card">
    <div class="faktur-header d-flex justify-content-between align-items-start">
        <div>
            <div class="d-flex align-items-center gap-2 mb-2">
                <div class="brand-indicator"></div>
                <h4 class="m-0 fw-bold tracking-wide">FAKTUR PEMBAYARAN</h4>
            </div>
            <span class="text-muted small">Mobil Terpilih</span>
            <h5 class="text-info fw-bold m-0 mt-1">{{ $transaction->car->nama_mobil ?? 'McLaren' }}</h5>
        </div>
        <div class="text-end">
            <span class="text-muted small">Total Tagihan</span>
            <h3 class="text-success fw-bold m-0 mt-1">Rp {{ number_format($transaction->total_harga ?? 8000000, 0, ',', '.') }}</h3>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2 mb-3">
        <i class="fa-solid fa-building-columns text-warning"></i>
        <div class="method-title">PILIHAN METODE PEMBAYARAN</div>
    </div>

    <form action="/transaction/{{ $transaction->id ?? 1 }}/confirm" method="POST">
        @csrf
        
        <input type="hidden" name="payment_method" id="selected_method" value="TRANSFER BANK (BCA)">

        <div class="payment-box">
            <div class="custom-badge badge-blue">Transfer Bank</div>
            
            <div class="row g-2 mb-3">
                <div class="col-4">
                    <div class="method-item active" onclick="selectBank('BCA', '8832 0192 3341')">
                        <span class="fw-bold small">BANK BCA</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="method-item" onclick="selectBank('MANDIRI', '1310 0982 1123')">
                        <span class="fw-bold small">MANDIRI</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="method-item" onclick="selectBank('BRI', '0023 0182 9911')">
                        <span class="fw-bold small">BANK BRI</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>

            <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1)">
                <div class="text-muted small">Nomor Rekening (<span id="bank_name_label">BCA</span>):</div>
                <div class="d-flex justify-content-between align-items-center mt-1">
                    <h4 class="text-white fw-bold m-0 tracking-wider" id="account_number">8832 0192 3341</h4>
                    <button type="button" class="btn btn-sm btn-link text-info p-0" onclick="copyText()" title="Salin Norek">
                        <i class="fa-regular fa-copy fs-5"></i>
                    </button>
                </div>
                <div class="text-muted small mt-1" style="font-size: 0.8rem;">a/n PT. Sewa Mobil Gacor</div>
            </div>
        </div>

        <div class="payment-box">
            <div class="custom-badge badge-red">Dompet Elektronik (Dana/GoPay/OVO) / QRIS</div>
            
            <div class="row g-2 mb-3">
                <div class="col-4">
                    <div class="method-item" onclick="selectWallet('DANA')">
                        <span class="fw-bold small">DANA</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="method-item" onclick="selectWallet('GOPAY')">
                        <span class="fw-bold small">GOPAY</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
                <div class="col-4">
                    <div class="method-item" onclick="selectWallet('OVO')">
                        <span class="fw-bold small">OVO</span>
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                </div>
            </div>

            <div class="text-center p-3 rounded-3" style="background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1)">
                <div class="mb-2">
                    <i class="fa-solid fa-qrcode text-info me-1"></i>
                    <span class="fw-bold small text-white">Pindai QRIS Gacor (<span id="wallet_name_label">Universal</span>)</span>
                </div>
                
                <div class="my-2">
                    <div class="qris-wrapper">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=SewaMobilGacorPayment" alt="QRIS Merchant" class="qris-img">
                    </div>
                </div>
                <p class="text-muted m-0" style="font-size: 0.8rem;">Buka aplikasi e-wallet pilihanmu di atas, lalu scan kode QRIS resmi di atas untuk melakukan transfer instan.</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-pay-now">
                <i class="fa-solid fa-circle-check me-2"></i>TRANSFER SAYA SUDAH / BAYAR
            </button>
            <div class="mt-3">
                <a href="/transaction" class="btn-later">Bayar Nanti Saja</a>
            </div>
        </div>
    </form>
</div>

<script>
    function selectBank(bankName, norek) {
        document.querySelectorAll('.method-item').forEach(item => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        // Atur string value yang dikirim ke backend
        document.getElementById('selected_method').value = "TRANSFER BANK (" + bankName + ")";
        document.getElementById('bank_name_label').innerText = bankName;
        document.getElementById('account_number').innerText = norek;
    }

    function selectWallet(walletName) {
        document.querySelectorAll('.method-item').forEach(item => item.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        // Atur string value yang dikirim ke backend
        document.getElementById('selected_method').value = "E-WALLET (" + walletName + ")";
        document.getElementById('wallet_name_label').innerText = walletName;
        
        document.getElementById('bank_name_label').innerText = 'E-Wallet Aktif';
        document.getElementById('account_number').innerText = 'Bayar via QRIS ' + walletName;
    }

    function copyText() {
        const norek = document.getElementById('account_number').innerText;
        navigator.clipboard.writeText(norek);
        alert('Nomor Rekening Berhasil Disalin: ' + norek);
    }
</script>
</body>
</html>