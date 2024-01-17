<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $guards = [];
    protected $fillable=['id','nama_metode'];


    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
