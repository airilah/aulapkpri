<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aula extends Model
{
    use HasFactory;
    protected $table = 'aulas';
    protected $guards = [];
    protected $fillable=['id','nama_aula','deskripsi','gambar'];

    public function paket()
    {
        return $this->hasMany(Paket::class);
    }
}
