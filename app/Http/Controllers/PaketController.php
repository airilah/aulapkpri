<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class PaketController extends Controller
{
    // Untuk yang belum login

    public function aula1(Request $request)
    {
        $query = Paket::query();
        $query->with(['pemesanan']); // Eager loading relasi

        $kategoriQuery = Paket::query();
        $kategori = $kategoriQuery->pluck('nama_acara', 'id');
        $harga = [
            '1000000-3000000' => 'Rp 1.000.000 - Rp 3.000.000',
            '3000000-5000000' => 'Rp 3.000.000 - Rp 5.000.000',
            // tambahkan rentang harga lainnya sesuai kebutuhan
        ];

        if ($request->has('paket') && $request->paket != 'Pilih Paket') {
            $query->where('id', $request->paket);
        }

        // Modifikasi filter berdasarkan rentang harga
        if ($request->has('harga') && $request->harga != 'Pilih Rentang Harga') {
            $hargaRange = explode('-', $request->harga);
            $query->where('harga', '>=', $hargaRange[0]);
            if (isset($hargaRange[1])) {
                $query->where('harga', '<=', $hargaRange[1]);
            }
        }

        $paket = $query->get();

        return view('aula1', [
            'title' => 'Aula 1',
            'paket' => $paket,
            'kategori' => $kategori,
            'harga' => $harga
        ]);
    }

    public function aula2(Request $request)
    {
        $query = Paket::query();
        $query->with(['pemesanan']); // Eager loading relasi

        $kategoriQuery = Paket::query();
        $kategori = $kategoriQuery->pluck('nama_acara', 'id');
        $harga = [
            '1000000-3000000' => 'Rp 1.000.000 - Rp 3.000.000',
            '3000000-5000000' => 'Rp 3.000.000 - Rp 5.000.000',
            // tambahkan rentang harga lainnya sesuai kebutuhan
        ];

        if ($request->has('paket') && $request->paket != 'Pilih Paket') {
            $query->where('id', $request->paket);
        }

        // Modifikasi filter berdasarkan rentang harga
        if ($request->has('harga') && $request->harga != 'Pilih Rentang Harga') {
            $hargaRange = explode('-', $request->harga);
            $query->where('harga', '>=', $hargaRange[0]);
            if (isset($hargaRange[1])) {
                $query->where('harga', '<=', $hargaRange[1]);
            }
        }

        $paket = $query->get();

        return view('aula2', [
            'title' => 'Aula 2',
            'paket' => $paket,
            'kategori' => $kategori,
            'harga' => $harga
        ]);
    }
    public function ipaket($id)
    {
        return view('informasi', [
            'title' => 'paket',
            'paket'=> paket::find($id)
        ]);
    }

    // untuk yang sudah login

    public function hal_aula1(Request $request)
    {
        $query = Paket::query();
        $query->with(['pemesanan']); // Eager loading relasi

        $kategoriQuery = Paket::query();
        $kategori = $kategoriQuery->pluck('nama_acara', 'id');
        $harga = [
            '1000000-3000000' => 'Rp 1.000.000 - Rp 3.000.000',
            '3000000-5000000' => 'Rp 3.000.000 - Rp 5.000.000',
            // tambahkan rentang harga lainnya sesuai kebutuhan
        ];

        if ($request->has('paket') && $request->paket != 'Pilih Paket') {
            $query->where('aula_id', 1)->where('id', $request->paket);
        } else {
            // Jika tidak ada pemilihan paket, hanya tampilkan paket dengan aula_id = 1
            $query->where('aula_id', 1);
        }

        // Modifikasi filter berdasarkan rentang harga
        if ($request->has('harga') && $request->harga != 'Pilih Rentang Harga') {
            $hargaRange = explode('-', $request->harga);
            $query->where('harga', '>=', $hargaRange[0]);
            if (isset($hargaRange[1])) {
                $query->where('harga', '<=', $hargaRange[1]);
            }
        }

        $paket = $query->get();

        return view('aula1', [
            'title' => 'Aula 1',
            'paket' => $paket,
            'kategori' => $kategori,
            'harga' => $harga
        ]);
    }

    public function hal_aula2(Request $request)
    {
        $query = Paket::query();
        $query->with(['pemesanan']); // Eager loading relasi

        $kategoriQuery = Paket::query();
        $kategori = $kategoriQuery->pluck('nama_acara', 'id');
        $harga = [
            '1000000-3000000' => 'Rp 1.000.000 - Rp 3.000.000',
            '3000000-5000000' => 'Rp 3.000.000 - Rp 5.000.000',
            // tambahkan rentang harga lainnya sesuai kebutuhan
        ];

        if ($request->has('paket') && $request->paket != 'Pilih Paket') {
            $query->where('aula_id', 2)->where('id', $request->paket);
        } else {
            // Jika tidak ada pemilihan paket, hanya tampilkan paket dengan aula_id = 1
            $query->where('aula_id', 2);
        }

        // Modifikasi filter berdasarkan rentang harga
        if ($request->has('harga') && $request->harga != 'Pilih Rentang Harga') {
            $hargaRange = explode('-', $request->harga);
            $query->where('harga', '>=', $hargaRange[0]);
            if (isset($hargaRange[1])) {
                $query->where('harga', '<=', $hargaRange[1]);
            }
        }

        $paket = $query->get();

        return view('aula2', [
            'title' => 'Aula 2',
            'paket' => $paket,
            'kategori' => $kategori,
            'harga' => $harga
        ]);
    }
    public function hal_ipaket($id)
    {
        return view('informasi', [
            'title' => 'paket',
            'paket'=> paket::find($id)
        ]);
    }

    public function daftar_katalog()
    {
        return view('admin/katalog', [
            'title' => 'Katalog',
            'katalog' => Paket::all(),
            'aula' => Aula::all()
        ]);
    }


    public function tambah_katalog(Request $request)
    {
        $paket = Paket::create($request->except(['token', 'submit']));
        if($request->has(('gambar'))){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        if ($paket->save()) {
            return redirect('/katalog')->with('tambah_katalog', 'Katalog Berhasil Ditambah!');
        };
    }

    public function delete_katalog($id)
    {
        Paket::find($id)->delete();
        return redirect()->back()->with("delete_katalog","Katalog Berhasil di Hapus");
    }


    public function update_katalog($id)
    {
        return view('admin/update/update_katalog', [
            'title' => 'Update Paket',
            'katalog'=> Paket::find($id),
            'aula'=> Aula::all()
        ]);
    }

    // public function edit_katalog1($id, Request $request)
    // {
    //     $paket = Paket::find($id);
    //     $paket->update($request->except(['token', 'submit']));
    //     if ($paket->save()){
    //         return redirect('/katalog')->with('edit_katalog', 'Katalog Berhasil Diupdate');
    //     }
    // }



    public function edit_katalog(Request $request)
    {
        // dd($request->file('gambar'));
        $paket = Paket::find($request->id);
        $paket->aula_id = $request->aula_id;
        $paket->kategori = $request->kategori;
        $paket->nama_paket = $request->nama_paket;
        $paket->nama_acara = $request->nama_acara;
        $paket->harga = $request->harga;
        $paket->kursi = $request->kursi;
        $paket->mic = $request->mic;
        $paket->lama_sewa = $request->lama_sewa;
        $paket->fasilitas = $request->fasilitas;

        $request->validate([
            'gambar' => 'required|image|mimes:pjeg,png,jpg,gif,svg',
         ]);
        // Periksa apakah ada file gambar yang diunggah
        if ($request->has('gambar')) {
            // Hapus gambar lama jika ada
            if ($paket->gambar) {
                Storage::delete('assets/img/' . $paket->gambar);
            }

            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
        }

        if ($paket->save()) {
            return redirect('/katalog')->with("edit_katalog", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/katalog')->with("edit_katalog", "Gagal Diupdate!");
        }
    }

}

