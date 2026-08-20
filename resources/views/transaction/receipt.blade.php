<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - {{ $transaction->id }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        .text-center { text-align: center; }
        .divider { border-top: 1px dashed #000; margin: 10px 0; }
        .flex-box { display: flex; justify-content: space-between; margin: 5px 0; }
        .bold { font-weight: bold; }
        
        #invoice-content {
            background: #ffffff;
            padding: 10px;
        }

        .btn-container {
            display: flex;
            gap: 8px;
            margin-top: 20px;
        }
        .btn-action {
            color: #fff; 
            border: none; 
            padding: 12px 10px;
            width: 100%; 
            cursor: pointer; 
            font-weight: bold;
            font-size: 0.75rem;
            font-family: 'Courier New', Courier, monospace;
            text-transform: uppercase;
            text-align: center;
            border-radius: 4px;
            transition: opacity 0.2s;
        }
        .btn-action:hover {
            opacity: 0.8;
        }
        .btn-blue { background: #0056b3; }
        .btn-black { background: #000000; }
        .btn-green { background: #25d366; }

        @media print {
            .no-print { 
                display: none !important; 
            }
            body {
                padding: 0;
                margin: 0;
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>

    <div id="invoice-content">
        <div class="text-center">
            <h2>SEWA MOBIL GACOR</h2>
            <p>Jl. Pegunungan Malam No. 101, Bandung</p>
            <p>Telp: 0812-3456-7890</p>
        </div>

        <div class="divider"></div>

        <div>
            <div class="flex-box"><span>No. Nota:</span><span>TRX-00{{ $transaction->id }}</span></div>
            
            <div class="flex-box">
                <span>Tanggal:</span>
                <span>{{ $transaction->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}</span>
            </div>
            
            <div class="flex-box"><span>Customer:</span><span>{{ $transaction->nama_peminjam }}</span></div>
            
            <div class="flex-box">
                <span>Metode:</span>
                <span class="bold" style="text-transform: uppercase;">{{ $transaction->payment_method ?? 'TRANSFER MANUAL' }}</span>
            </div>
        </div>

        <div class="divider"></div>

        <div class="bold text-center">Rincian Sewa</div>
        <div class="flex-box">
            <span>{{ $transaction->car->nama_mobil ?? 'Mobil N/A' }}</span>
            <span>{{ $transaction->durasi_sewa }} Hari</span>
        </div>
        <div class="flex-box" style="font-size: 0.85rem; padding-left: 10px; color: #555;">
            <span>tgl pinjam:</span><span>{{ \Carbon\Carbon::parse($transaction->tgl_pinjam)->format('d-m-Y') }}</span>
        </div>
        <div class="flex-box" style="font-size: 0.85rem; padding-left: 10px; color: #555;">
            <span>tgl kembali:</span><span>{{ \Carbon\Carbon::parse($transaction->tgl_kembali)->format('d-m-Y') }}</span>
        </div>

        <div class="divider"></div>

        <div class="flex-box bold" style="font-size: 1.2rem;">
            <span>TOTAL:</span>
            <span>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</span>
        </div>
        
        <div class="flex-box" style="margin-top: 5px;">
            <span>Status:</span>
            <span class="bold" style="color: green; text-transform: uppercase;">*** LUNAS ***</span>
        </div>

        <div class="divider"></div>

        <div class="text-center" style="margin-top: 20px; font-size: 0.9rem;">
            <p>Terima kasih telah mempercayai kami!</p>
            <p>Harap bawa struk ini saat pengambilan unit armada.</p>
        </div>
    </div>

    <div class="btn-container no-print">
        <button class="btn-action btn-blue" onclick="aksiCetak()">CETAK</button>
        <button class="btn-action btn-black" onclick="aksiUnduhPDF()">UNDUH PDF</button>
        <button class="btn-action btn-green" onclick="aksiBagikan()">BAGIKAN</button>
    </div>

    <script>
        function aksiCetak() {
            window.print();
        }

        function aksiUnduhPDF() {
            const element = document.getElementById('invoice-content');
            const opsi = {
                margin:       10,
                filename:     'Struk-Sewa-TRX-00{{ $transaction->id }}.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 }, 
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opsi).from(element).save();
        }

        function aksiBagikan() {
            if (navigator.share) {
                navigator.share({
                    title: 'Struk Sewa Mobil Gacor',
                    text: 'Halo bro, ini bukti struk pembayaran sewa mobil lu dengan nomor nota TRX-00{{ $transaction->id }} sudah LUNAS! Cek di sini:',
                    url: window.location.href
                })
                .then(() => console.log('Berhasil membagikan struk!'))
                .catch((error) => console.log('Gagal membagikan:', error));
            } else {
                let teksWA = encodeURIComponent("Halo bro, ini bukti struk pembayaran sewa mobil lu dengan nomor nota TRX-00{{ $transaction->id }} sudah LUNAS! 🏎️ Cek struk digital lu di sini: " + window.location.href);
                window.open("https://api.whatsapp.com/send?text=" + teksWA, "_blank");
            }
        }
    </script>

</body>
</html>