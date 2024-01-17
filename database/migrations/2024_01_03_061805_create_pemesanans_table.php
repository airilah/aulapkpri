<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paket_id')->constrained('pakets');
            $table->foreignId('pembayaran_id')->constrained('pembayarans');
            $table->timestamp('waktu_expired')->nullable();
            $table->date('tanggal_sewa');
            $table->time('jam_sewa');
            $table->integer('lama_sewa');
            $table->integer('tambah_kursi');
            $table->integer('tambah_mic');
            $table->string('tambah_proyektor')->nullable();
            $table->string('kebersihan')->nullable();
            $table->string('ruang_transit')->nullable();
            $table->string('kuade_luar')->nullable();
            $table->string('gladi_bersih')->nullable();
            $table->integer('total_harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->default('Belum terverifikasi');
            $table->timestamps();
        });
        DB::statement("SET time_zone = '+07:00'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
