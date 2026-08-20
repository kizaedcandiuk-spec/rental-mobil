<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    // 1. Tampilkan Riwayat Transaksi
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role === 'admin') {
            $transactions = Transaction::with(['car', 'user'])->latest()->get();
        } else {
            $transactions = Transaction::with('car')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        }

        return view('transaction.index', compact('transactions'));
    }

    // FIX BARU: Fungsi create untuk nampilin form sewa mobil
    public function create(Request $request)
    {
        // Ambil car_id dari parameter URL (?car_id=7)
        $carId = $request->query('car_id');

        // Cari data mobilnya di database
        $car = Car::findOrFail($carId);

        // Arahkan ke file form sewa lu (menurut komentar di web.php lu, nama filenya ada di views/cars/show.blade.php)
        return view('cars.show', compact('car'));
    }

    // 2. Simpan Data Sewa Baru
    public function store(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $tgl_pinjam = Carbon::parse($request->tgl_pinjam);
        $tgl_kembali = Carbon::parse($request->tgl_kembali);
        $durasi = $tgl_pinjam->diffInDays($tgl_kembali);

        if($durasi == 0) $durasi = 1;

        $total_harga = $durasi * $car->harga_sewa;

        $transaction = Transaction::create([
            'user_id'           => Auth::id(),
            'nama_peminjam'     => $request->nama_peminjam,
            'car_id'            => $car->id,
            'tgl_pinjam'        => $request->tgl_pinjam,
            'tgl_kembali'       => $request->tgl_kembali,
            'durasi_sewa'       => $durasi,
            'total_harga'       => $total_harga,
            'status_pembayaran' => 'pending',
        ]);

        $car->update(['status' => 'Disewa']);

        return redirect('/transaction/' . $transaction->id . '/payment')->with('success', 'Booking berhasil! Silakan lakukan pembayaran.');
    }

    // 3. Tampilkan Halaman Pilihan Rekening
    public function payment($id)
    {
        $transaction = Transaction::with('car')->findOrFail($id);
        
        if ($transaction->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('transaction.payment', compact('transaction'));
    }

    // 4. FIX OTOMATISASI: Menangkap Input Metode Transfer & Simpan Ke Database
    public function confirmPayment(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        
        // Simpan status lunas dan tangkap jenis transfer dari form input
        $transaction->update([
            'status_pembayaran' => 'lunas',
            'payment_method'    => $request->input('payment_method', 'TRANSFER MANUAL')
        ]);

        return redirect()->route('transaction.receipt', $transaction->id)->with('success', 'Pembayaran sukses! Ini struk rental Anda.');
    }

    // 5. Tampilkan Struk / Nota Hanya Jika Sudah Lunas
    public function downloadReceipt($id)
    {
        $transaction = Transaction::with(['car', 'user'])->findOrFail($id);

        if ($transaction->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        if ($transaction->status_pembayaran !== 'lunas') {
            return redirect('/transaction/' . $transaction->id . '/payment')->with('error', 'Invoice belum dibayar!');
        }

        return view('transaction.receipt', compact('transaction'));
    }

    // 6. Fitur Pengembalian Mobil & Hitung Denda
    public function returnCar($id)
    {
        $transaction = Transaction::findOrFail($id);
        $car = $transaction->car;

        $tglKembaliAsli = now();
        $tglHarusKembali = Carbon::parse($transaction->tgl_kembali);

        $denda = 0;
        $tarifDendaPerHari = 50000; 

        if ($tglKembaliAsli->gt($tglHarusKembali)) {
            $selisihHari = $tglKembaliAsli->diffInDays($tglHarusKembali);
            $denda = $selisihHari * $tarifDendaPerHari;
        }

        $transaction->update([
            'status_pembayaran' => 'lunas',
            'total_harga' => $transaction->total_harga + $denda,
        ]);

        $car->update(['status' => 'Tersedia']);

        return redirect('/transaction')->with('success', "Mobil balik! Denda: Rp " . number_format($denda, 0, ',', '.'));
    }

    // 7. Hapus Riwayat
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        if ($transaction->car && $transaction->car->status == 'Disewa') {
            $transaction->car->update(['status' => 'Tersedia']);
        }

        $transaction->delete();
        return redirect()->back()->with('success', 'Riwayat berhasil dihapus!');
    }
}