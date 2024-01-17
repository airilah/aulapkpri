<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    // untuk yg belum login
    public function info_pembayaran()
    {
        return view('pembayaran', [
            'title' => 'pembayaran',
            'bayar' => Pembayaran::all(),
        ]);
    }

    // untuk yg sudah login
    public function hal_info_pembayaran()
    {
        return view('pembayaran', [
            'title' => 'pembayaran',
            'bayar' => Pembayaran::all(),
        ]);
    }

    public function daftar_pembayaran()
    {
        return view('admin/pembayaran', [
            'title' => 'Pembayaran',
            'pembayaran' => Pembayaran::all(),
        ]);
    }

    public function tambah_pembayaran(Request $request)
    {
        $pembayaran=new Pembayaran;
        $pembayaran->nama_metode=$request->nama_metode;
        $pembayaran->no_rek=$request->no_rek;
        $pembayaran->an=$request->an;
        $pembayaran->save();

        return redirect('/daftar_pembayaran')->with("tambah_pembayaran","Tambah Metode Pembayaran Berhasil!");
    }

    public function delete_pembayaran($id)
    {
        Pembayaran::find($id)->delete();
        return redirect()->back()->with("delete_pembayaran","Metode Pembayaran Berhasil di Hapus");
    }


    public function update_pembayaran($id)
    {
        return view('admin/update/update_pembayaran', [
            'title' => 'Update Pembayaran',
            'pembayaran'=> Pembayaran::find($id),
        ]);
    }

    public function edit_pembayaran($id, Request $request)
    {
        $paket = Pembayaran::find($id);
        $paket->update($request->except(['token', 'submit']));
        if ($paket->save()){
            return redirect('/daftar_pembayaran')->with('edit_pembayaran', 'Metode Pembayaran Berhasil Diupdate');
        }
    }
}
