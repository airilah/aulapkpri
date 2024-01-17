<?php

namespace App\Models;


use App\Models\Aula;
use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'pakets';
    protected $guards = [];
    protected $fillable=['id','aula_id','kategori','nama_paket','nama_acara','harga','kursi','mic','lama_sewa','fasilitas','gambar'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function aula() {
        return $this->belongsTo(Aula::class);
    }
}
