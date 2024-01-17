<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Paket;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_sewa',
        'jam_sewa',
        'tambah_kursi',
        'tambah_mic',
        'tambah_proyektor',
        'kebersihan',
        'ruang_transit',
        'kuade_luar',
        'gladi_bersih',
        'total_harga',
    ];

    protected $dates=[
        'tanggal_sewa'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function paket() {
        return $this->belongsTo(Paket::class);
    }
    public function pembayaran() {
        return $this->belongsTo(Pembayaran::class);
    }

    // public function setWaktuExpiredAttribute()
    // {
    //     // Gunakan metode addDay untuk menambah 1 hari
    //     $this->attributes['waktu_expired'] = now()->addMinutes(1);
    // }
}
