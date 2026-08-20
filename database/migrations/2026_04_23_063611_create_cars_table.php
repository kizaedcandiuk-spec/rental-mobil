<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mobil');
        $table->string('merk');
        $table->string('nomer_plat')->unique();
        $table->integer('harga_sewa'); // Harga per hari
        $table->string('status')->default('tersedia'); // tersedia / disewa
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
