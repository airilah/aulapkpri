<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\User;
use App\Models\Admin;
use App\Models\Paket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard()
    {
        $income = DB::table('pemesanans')->whereIn('status', ['Bayar DP', 'Lunas'])->sum('total_harga');
        $digunakan = DB::table('pemesanans')->whereIn('status', ['Belum terverifikasi', 'Menunggu Konfirmasi'])->count();
        $customer = DB::table('users')->where('role', 'customer')->count();
        $admin = DB::table('users')->where('role', 'admin')->count();
        $antrian = Pemesanan::limit(10)->whereIn('status', ['Belum terverifikasi', 'Menunggu Konfirmasi'])->get();
        $gedung = Paket::all();
        $users = User::limit(5)->orderBy('created_at', 'desc')->where('role', 'customer')->get();

        $total_harga = Pemesanan::select(DB::raw("CAST(SUM(total_harga) as int) as total_harga"))
        ->whereIn('status', ['Bayar DP', 'Lunas'])
        ->groupBy(DB::raw("Month(tanggal_sewa)"))
        ->orderByRaw("Month(tanggal_sewa)")
        ->pluck('total_harga');

        $bulan = Pemesanan::select(DB::raw("MONTHNAME(tanggal_sewa) as bulan"))
        ->groupBy(DB::raw("MONTHNAME(tanggal_sewa)"))
        ->orderByRaw("Month(tanggal_sewa)")
        ->pluck('bulan');

        return view('admin/dashboard',compact('income','digunakan','customer','admin','antrian','gedung','users','total_harga','bulan'));
    }

    // public function kalender()
    // {
    //     $kalender = DB::table('pemesanans')->get();
    //     $rapat = DB::table('pemesanans')->where('status', 'Belum terverifikasi')->count();
    //     $seminar = DB::table('pemesanans')->get();
    //     $diklat = DB::table('pemesanans')->get();
    //     // $wisuda = DB::table('pemesanan')->whereIn('status', ['Belum terverifikasi', 'Menunggu Konfirmasi'])->get();
    //     // $events = Pemesanan::all();
    //     // return response()->json($events);

    //     return view('admin/kalender',compact('kalender','rapat','seminar','diklat'));
    // }


}

