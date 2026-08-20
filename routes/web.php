<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LoginController;

// =============================================================
// 1. RUTE PUBLIC (Bisa diakses siapa saja TANPA LOGIN)
// =============================================================

// Orang umum pertama kali buka web
Route::get('/', function () {
    return view('landing'); 
});

// Rute Autentikasi Login, Register & Logout
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'showRegister']);
Route::post('/register', [LoginController::class, 'register']);


// =============================================================
// 2. RUTE PROTECTED (Wajib Login, Pengguna Biasa & Admin Bisa Akses)
// =============================================================
Route::middleware(['auth'])->group(function () {

    // === DASHBOARD SETELAH LOGIN ===
    Route::get('/dashboard', function () {
        return view('welcome'); 
    })->name('dashboard');

    // Daftar Mobil & Fitur Riwayat
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    
    // Rute Transaksi
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/riwayat', [TransactionController::class, 'index']);

    // Rute Pembayaran & Struk
    Route::get('/transaction/{id}/payment', [TransactionController::class, 'payment'])->name('transaction.payment');
    Route::post('/transaction/{id}/confirm', [TransactionController::class, 'confirmPayment'])->name('transaction.confirm');
    Route::get('/transaction/{id}/receipt', [TransactionController::class, 'downloadReceipt'])->name('transaction.receipt');
    
    // =============================================================
    // 3. RUTE KHUSUS ADMIN (Hanya Akun dengan Role Admin)
    // =============================================================
    Route::middleware(['admin'])->group(function () {
        
        // Fitur Kelola Data Mobil Admin (Taruh paling atas di grup admin)
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store'); 
        Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
        
        // Fitur Kelola Transaksi Admin (Pengembalian mobil & Hapus Riwayat)
        Route::post('/transaction/{id}/return', [TransactionController::class, 'returnCar']);
        Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    });

    // =============================================================
    // 4. RUTE PARAMETER DINAMIS (Paling Bawah - Agar Tidak Tabrakan dengan /cars/create)
    // =============================================================
    Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show'); 
    Route::post('/cars/{id}/rent', [TransactionController::class, 'store']); 

});