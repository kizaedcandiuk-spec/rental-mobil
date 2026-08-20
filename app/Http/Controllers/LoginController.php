<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // <-- TAMBAHAN: Biar controller kenal sama tabel users lu bro!

class LoginController extends Controller
{
    // 1. Tampilin halaman login
    public function showLogin()
    {
        return view('login');
    }

    // 2. Proses pencocokan data akun ke database
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // FIX BANGET DISINI: Berhasil login, lempar ke rute /dashboard (welcome.blade.php)
            return redirect('/dashboard'); 
        }

        // Kalau gagal, balikin ke halaman login lagi dengan pesan peringatan
        return back()->with('error', 'Email atau Password lu salah, bro!');
    }

    // 3. Fitur Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // BALIKIN KE LANDING PAGE: Pas logout, balik ke halaman landing utama (landing.blade.php)
        return redirect('/');
    }

    // =============================================================
    // FITUR REGISTER (DAFTAR AKUN BARU)
    // =============================================================

    // 4. Tampilin halaman register
    public function showRegister()
    {
        return view('register');
    }

    // 5. Proses nyimpen data pendaftaran ke database
    public function register(Request $request)
    {
        // Validasi inputan pengunjung biar gak ngasal
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Email gak boleh kembar
            'password' => 'required|string|min:6', // Minimal password 6 karakter
        ]);

        // Masukin data ke tabel users
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Password otomatis di-hash aman biar gak kelihatan mentah
            'role' => 'user', // Otomatis diset sebagai user biasa, bukan admin
        ]);

        // Lempar ke halaman login sambil bawa pesan sukses
        return redirect('/login')->with('success', 'Akun berhasil dibuat! Silahkan login bro.');
    }
}