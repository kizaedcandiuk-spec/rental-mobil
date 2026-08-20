<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'nama_peminjam',
        'car_id',
        'tgl_pinjam',
        'tgl_kembali',
        'durasi_sewa',
        'total_harga',
        'status_pembayaran',
        'payment_method' 
    ];

    // Relasi ke Car (Mobil)
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    // Relasi ke User (Akun)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}