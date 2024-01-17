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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained('aulas');
            $table->string('kategori');
            $table->string('nama_paket');
            $table->string('nama_acara');
            $table->string('harga');
            $table->string('kursi');
            $table->string('mic');
            $table->string('lama_sewa');
            $table->string('fasilitas',1000);
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
