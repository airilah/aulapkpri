<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function info_pendaftaran()
    {
        return view('pendaftaran', [
            'title' => 'Informasi Pendaftaran',
        ]);
    }
    public function info_reservasi()
    {
        return view('reservasi', [
            'title' => 'Informasi Reservasi',
        ]);
    }
    public function pendaftaran()
    {
        return view('pendaftaran', [
            'title' => 'Informasi Pendaftaran',
        ]);
    }
    public function reservasi()
    {
        return view('reservasi', [
            'title' => 'Informasi Reservasi',
        ]);
    }
}
