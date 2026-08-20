<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('nama_peminjam');
        $table->foreignId('car_id')->constrained('cars')->onDelete('cascade'); 
        $table->integer('durasi_sewa'); 
        $table->integer('total_harga');
        $table->enum('status_pembayaran', ['belum_bayar', 'lunas'])->default('belum_bayar');
        $table->timestamps();
    }); // <--- Pastiin ada titik koma di sini!
}
};
