<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\User;
use App\Models\Paket;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class PemesananController extends Controller
{

    public function riwayat()
    {
        $pesan = Pemesanan::with(['user', 'paket'])
        ->where(function ($query) {
            $query->where('waktu_expired', '<', now())
                ->whereIn('status', ['Lunas', 'Menunggu Konfirmasi', 'Bayar DP']);
        })
        ->orWhere('waktu_expired', '>', now())
        ->get();

        return view('riwayat', [
            'title' => 'Pemesanan',
            'pesan' => $pesan,
        ]);
    }

    // untuk yg sudah login
    public function hal_pesan($id)
    {
        return view('pemesanan', [
            'title' => 'Pemesanan',
            'paket'=> Paket::find($id),
            'user'=> User::find($id),
            'pembayaran'=> Pembayaran::all(),
        ]);
    }

    public function tambah_pemesanan(Request $request)
    {
        // dd($request->all());
        $pemesanan=new Pemesanan;
        $pemesanan->user_id=$request->user_id;
        $pemesanan->paket_id=$request->paket_id;
        $pemesanan->pembayaran_id=$request->pembayaran_id;
        $pemesanan->tanggal_sewa=$request->tanggal_sewa;
        $pemesanan->jam_sewa=$request->jam_sewa;
        $pemesanan->lama_sewa=$request->lama_sewa;
        $pemesanan->tambah_kursi=$request->tambah_kursi;
        $pemesanan->tambah_mic=$request->tambah_mic;
        $pemesanan->tambah_proyektor=$request->tambah_proyektor;
        $pemesanan->kebersihan=$request->kebersihan;
        $pemesanan->ruang_transit=$request->ruang_transit;
        $pemesanan->kuade_luar=$request->kuade_luar;
        $pemesanan->gladi_bersih=$request->gladi_bersih;
        $pemesanan->total_harga= intval($request->total_harga);
        $pemesanan->keterangan=$request->keterangan;

        // Hitung waktu expired (24 jam dari sekarang)
        $waktuExpired = now()->addDay();
        // $waktuExpired = now()->addMinutes(1);
        // Simpan waktu_expired ke dalam pemesanan
        $pemesanan->waktu_expired = $waktuExpired;

        $pemesanan->save();

        // Setelah menyimpan, kita cek apakah bukti_pembayaran tidak diisi dan waktu telah melewati waktu_expired
        if (!$request->has('bukti_pembayaran') && now()->gt($waktuExpired)) {
            // Jika tidak diisi dan waktu melewati waktu_expired, ubah status menjadi 'Kadaluarsa'
            $pemesanan->status = 'Kadaluarsa';
            $pemesanan->save();

            // Redirect ke riwayat dengan pesan
            return redirect('/riwayat')->with("tenggat", "Reservasi berhasil ditambah. Pemesanan telah kadaluwarsa karena tidak ada bukti pembayaran.");
        }

        return redirect('/riwayat')->with("tambah_pemesanan", "Reservasi berhasil ditambah. Silakan lakukan pembayaran sebelum 24 jam!");
    }

    public function bukti($id, Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        $Pemesanan = Pemesanan::find($id);
        // dd();
        $Pemesanan->update($request->only(['bukti_pembayaran']));
        if($request->has(('bukti_pembayaran'))){
            $request->file('bukti_pembayaran')->move('assets/img/upload', $request->file('bukti_pembayaran')->getClientOriginalName());
            $Pemesanan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $Pemesanan->status = 'Menunggu Konfirmasi';
            $Pemesanan->save();
        }
        if ($Pemesanan->save()){
            return redirect()->back()->with('tambah_bukti', 'Bukti pembayaran berhasil diupload');
        }
    }

    public function delete_pemesanan($id)
    {
        pemesanan::find($id)->delete();
        return redirect()->back()->with("delete_pemesanan","Reservasi Berhasil di Hapus");
    }



    public function invoice($id)
    {
        $invoice = Pemesanan::with(['user', 'paket', 'paket.aula', 'pembayaran'])
            ->where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('invoice', [
            'title' => 'Invoice',
            'invoice' => $invoice,
        ]);
    }

    public function cetak_butki($id)
    {
        $invoice = Pemesanan::with(['user', 'paket', 'paket.aula', 'pembayaran'])
            ->where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('cetak', [
            'title' => 'Invoice',
            'invoice' => $invoice,
        ]);
        // Assuming there is a variable named $invoice, you should use it in the view
        return view('cetak', compact('riwayat'));
    }

    // admin

    public function riwayat_admin()
    {
        $pesan = Pemesanan::with(['user', 'paket'])
        ->where(function ($query) {
            $query->where('waktu_expired', '<', now())
                ->whereIn('status', ['Lunas', 'Menunggu Konfirmasi', 'Bayar DP']);
        })
        ->orWhere('waktu_expired', '>', now())
        ->get();

        return view('admin.riwayat_admin', [
            'title' => 'Pemesanan',
            'pesan' => $pesan,
        ]);
    }

    // untuk yg sudah login
    public function hal_pesan_admin($id)
    {
        return view('pemesanan', [
            'title' => 'Pemesanan',
            'paket'=> Paket::find($id),
            'user'=> User::find($id),
            'pembayaran'=> Pembayaran::all(),
        ]);
    }

    public function tambah_pemesanan_admin(Request $request)
    {
        // dd($request->all());
        $pemesanan=new Pemesanan;
        $pemesanan->user_id=$request->user_id;
        $pemesanan->paket_id=$request->paket_id;
        $pemesanan->pembayaran_id=$request->pembayaran_id;
        $pemesanan->tanggal_sewa=$request->tanggal_sewa;
        $pemesanan->jam_sewa=$request->jam_sewa;
        $pemesanan->lama_sewa=$request->lama_sewa;
        $pemesanan->tambah_kursi=$request->tambah_kursi;
        $pemesanan->tambah_mic=$request->tambah_mic;
        $pemesanan->tambah_proyektor=$request->tambah_proyektor;
        $pemesanan->kebersihan=$request->kebersihan;
        $pemesanan->ruang_transit=$request->ruang_transit;
        $pemesanan->kuade_luar=$request->kuade_luar;
        $pemesanan->gladi_bersih=$request->gladi_bersih;
        $pemesanan->total_harga= intval($request->total_harga);
        $pemesanan->keterangan=$request->keterangan;

        // Hitung waktu expired (24 jam dari sekarang)
        $waktuExpired = now()->addDay();
        // $waktuExpired = now()->addMinutes(1);
        // Simpan waktu_expired ke dalam pemesanan
        $pemesanan->waktu_expired = $waktuExpired;

        $pemesanan->save();

        // Setelah menyimpan, kita cek apakah bukti_pembayaran tidak diisi dan waktu telah melewati waktu_expired
        if (!$request->has('bukti_pembayaran') && now()->gt($waktuExpired)) {
            // Jika tidak diisi dan waktu melewati waktu_expired, ubah status menjadi 'Kadaluarsa'
            $pemesanan->status = 'Kadaluarsa';
            $pemesanan->save();

            // Redirect ke riwayat dengan pesan
            return redirect('/admin/riwayat_admin')->with("tenggat", "Reservasi berhasil ditambah. Pemesanan telah kadaluwarsa karena tidak ada bukti pembayaran.");
        }

        // return redirect('/admin/riwayat_admin')->with("tambah_pemesanan", "Reservasi berhasil ditambah. Silakan lakukan pembayaran sebelum 24 jam!");
        return redirect('/admin/riwayat_admin')->with("tambah_pemesanan", "Reservasi berhasil ditambah. Silakan lakukan pembayaran sebelum 24 jam!");

    }

    public function bukti_admin($id, Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
         ]);

        $Pemesanan = Pemesanan::find($id);
        // dd();
        $Pemesanan->update($request->only(['bukti_pembayaran']));
        if($request->has(('bukti_pembayaran'))){
            $request->file('bukti_pembayaran')->move('assets/img/upload', $request->file('bukti_pembayaran')->getClientOriginalName());
            $Pemesanan->bukti_pembayaran = $request->file('bukti_pembayaran')->getClientOriginalName();
            $Pemesanan->status = 'Menunggu Konfirmasi';
            $Pemesanan->save();
        }
        if ($Pemesanan->save()){
            return redirect()->back()->with('tambah_bukti', 'Bukti pembayaran berhasil diupload');
        }
    }

    public function delete_pemesanan_admin($id)
    {
        pemesanan::find($id)->delete();
        return redirect()->back()->with("delete_pemesanan","Reservasi Berhasil di Hapus");
    }



    public function invoice_admin($id)
    {
        $invoice = Pemesanan::with(['user', 'paket', 'paket.aula', 'pembayaran'])
            ->where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('invoice', [
            'title' => 'Invoice',
            'invoice' => $invoice,
        ]);
    }

    public function cetak_butki_admin($id)
    {
        $invoice = Pemesanan::with(['user', 'paket', 'paket.aula', 'pembayaran'])
            ->where('id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('cetak', [
            'title' => 'Invoice',
            'invoice' => $invoice,
        ]);
        // Assuming there is a variable named $invoice, you should use it in the view
        return view('cetak', compact('riwayat'));
    }



    public function daftar_antrian()
    {
        $booking = Pemesanan::select('*')->whereIn('status',[ 'Belum terverifikasi', 'Menunggu Konfirmasi', 'Bayar DP'])->get();
        return view('admin/antrian',compact('booking'));
    }

    public function daftar_laporan()
    {
        $riwayat = Pemesanan::select('*')->where('status', 'Lunas')->get();
        return view('admin/laporan',compact('riwayat'));
    }

    public function pesanankonfirmasi($id)
    {
        DB::table('pemesanans')->where('id',$id)->update(['status' => 'Lunas']);
        return redirect('/daftar_antrian')->with("update_pesan","Pesanan Berhasil Terkonfirmasi!");

    }

    public function pesanandp($id)
    {
        DB::table('pemesanans')->where('id',$id)->update(['status' => 'Bayar DP']);
        return redirect('/daftar_antrian')->with("update_pesan","Pesanan Berhasil Terkonfirmasi!");
    }

    public function cetak_laporan()
    {
        $riwayat = Pemesanan::select('*')->where('status', 'Lunas')->get();
        return view('admin/export-laporan',compact('riwayat'));
    }

    public function pesananbatal($id)
    {
        DB::table('pemesanans')->where('id',$id)->delete();
        return redirect('/daftar_antrian')->with('delete_pesan', "Pemesanan Berhasil Dihapus!");
    }

    public function kalender()
    {
        $riwayat = Pemesanan::select('*')->get();
        return view('admin/kalender');
    }




}
