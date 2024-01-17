<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;


class AulaController extends Controller
{
    public function index(Request $request)
    {
        // $kategori = Aula::all();
        $query = Aula::query();
        $query->with(['paket.pemesanan']); // Eager loading relasi
        $kategoriQuery = Aula::query();
        $kategori = $kategoriQuery->pluck('nama_aula', 'id');

        if ($request->has('aula') && $request->aula != 'Pilih Kategori') {
            $query->where('id', $request->aula);
        }

        if ($request->has('tanggal')) {
            $query->whereDoesntHave('paket.pemesanan', function (Builder $query) use ($request) {
                $query->where('tanggal_sewa', $request->tanggal);
            });
        }

        $aula = $query->get();

        return view('home', [
            'title' => 'Home',
            'aula' => $aula,
            'kategori' => $kategori,
        ]);
    }

    public function hal_utama()
    {
        return view('home', [
            'title' => 'home',
            'aula' => Aula::all()
        ]);
    }

    public function daftar_aula()
    {
        return view('admin/aula', [
            'title' => 'Aula',
            'aula' => Aula::all(),
        ]);
    }

    public function tambah_aula(Request $request)
    {
        $paket = Aula::create($request->except(['token', 'submit']));
        if($request->has(('gambar'))){
            $request->file('gambar')->move('assets/img/', $request->file('gambar')->getClientOriginalName());
            $paket->gambar = $request->file('gambar')->getClientOriginalName();
            $paket->save();
        }
        if ($paket->save()) {
            return redirect('/aula')->with('tambah_aula', 'Aula Berhasil Ditambah!');
        };
    }

    public function delete_aula($id)
    {
        Aula::find($id)->delete();
        return redirect()->back()->with("delete_aula","Aula Berhasil di Hapus");
    }


    public function update_aula($id)
    {
        return view('admin/update/update_aula', [
            'title' => 'Update Aula',
            'aula'=> Aula::find($id),
        ]);
    }

    public function edit_aula1($id, Request $request)
    {
        $paket = Aula::find($id);
        $paket->update($request->except(['token', 'submit']));
        if ($paket->save()){
            return redirect('/aula')->with('edit_aula', 'Aula Berhasil Diupdate');
        }
    }


    public function edit_aula(Request $request)
    {
        // dd($request->file('gambar'));
        $paket = Aula::find($request->id);
        $paket->nama_aula = $request->nama_aula;
        $paket->deskripsi = $request->deskripsi;


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
            return redirect('/aula')->with("edit_aula", "Berhasil Diupdate!");
        } else {
            // Handle the case where the save fails
            return redirect('/aula')->with("edit_aula", "Gagal Diupdate!");
        }
    }
}
