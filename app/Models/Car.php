<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mobil',
        'merk',
        'nomer_plat',
        'harga_sewa',
        'status'
    ];
}