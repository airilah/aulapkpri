<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $guards = [];
    protected $fillable=['id','nama_anggota','no','tanggal','pukul','keterangan'];

}
