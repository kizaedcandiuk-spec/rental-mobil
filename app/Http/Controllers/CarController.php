<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // 1. Tampilkan semua daftar armada mobil
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    // 2. Tampilkan form untuk tambah mobil baru
    public function create()
    {
        return view('cars.create');
    }

    // 3. Simpan mobil baru ke database dengan validasi
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'merk'       => 'required|string|max:255',
            'nomer_plat' => 'required|string|max:50',
            'harga_sewa' => 'required|numeric',
            'status'     => 'required|string'
        ]);

        Car::create([
            'nama_mobil' => $request->nama_mobil,
            'merk'       => $request->merk,
            'nomer_plat' => $request->nomer_plat,
            'harga_sewa' => $request->harga_sewa,
            'status'     => $request->status,
        ]);

        return redirect('/cars')->with('success', 'Mobil berhasil ditambahkan!');
    }

    // 4. Tampilkan form edit mobil berdasarkan ID
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    // 5. Update data mobil di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'merk'       => 'required|string|max:255',
            'nomer_plat' => 'required|string|max:50',
            'harga_sewa' => 'required|numeric',
            'status'     => 'required|string'
        ]);

        $car = Car::findOrFail($id);
        
        // Update dipetakan secara manual agar datanya pasti masuk ke database
        $car->update([
            'nama_mobil' => $request->nama_mobil,
            'merk'       => $request->merk,
            'nomer_plat' => $request->nomer_plat,
            'harga_sewa' => $request->harga_sewa,
            'status'     => $request->status,
        ]);

        return redirect('/cars')->with('success', 'Data mobil berhasil diperbarui!');
    }

    // 6. Hapus data mobil
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/cars')->with('success', 'Mobil berhasil dihapus!');
    }

    // ========================================================
    // FIX: FITUR TAMPIL FORM INPUT TANGGAL SEWA (AESTHETIC VIEW)
    // ========================================================
    /**
     * Menampilkan halaman detail mobil + input tanggal sewa
     * Dipanggil oleh rute: GET /cars/{id}
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        
        // Proteksi tingkat dewa: Kalau mobil sudah disewa, tendang balik ke katalog
        if ($car->status == 'Disewa') {
            return redirect('/cars')->with('error', 'Waduh bro, mobil ini lagi jalan/disewa orang lain!');
        }

        // Me-render file view Glassmorphism Night Sky yang kita buat tadi (cars/show.blade.php)
        return view('cars.show', compact('car'));
    }
}