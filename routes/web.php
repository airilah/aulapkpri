<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengurusesController;
use App\Http\Controllers\PengurusController;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Pengurus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    // Your routes here
    Route::group(['middleware' => ['auth', 'CekRole:customer']], function () {
        Route::get('/', [AulaController::class, 'hal_utama'])->name('hal_utama');

        Route::get('/aula1', [PaketController::class, 'hal_aula1'])->name('hal_aula1');
        Route::get('/aula2', [PaketController::class, 'hal_aula2'])->name('hal_aula2');

        Route::get('/tentang', [AnggotaController::class, 'anggota'])->name('anggota');
        Route::get('/reservasi', [InformasiController::class, 'info_reservasi'])->name('info_reservasi');
        Route::get('/pembayaran', [PembayaranController::class, 'hal_info_pembayaran'])->name('hal_info_pembayaran');

        Route::get('/informasi/{id}', [PaketController::class, 'hal_ipaket'])->name('hal_ipaket');
        Route::get('/pemesanan/{id}', [PemesananController::class, 'hal_pesan'])->name('hal_pesan');
        Route::post('/tambah_pemesanan', [PemesananController::class, 'tambah_pemesanan'])->name('tambah_pemesanan');
        Route::get('/riwayat', [PemesananController::class,'riwayat'])->name('riwayat');
        Route::get('/riwayat/{id}/delete', [PemesananController::class,'delete_pemesanan'])->name('delete_pemesanan');
        Route::post('/bukti/{id}', [PemesananController::class, 'bukti'])->name('bukti');
        Route::get('/invoice/{id}', [PemesananController::class, 'invoice'])->name('invoice');
        Route::get('/cetak_bukti/{id}', [PemesananController::class, 'cetak_butki'])->name('cetak_butki');

        Route::get('/profile/{id}/edit', [AktorController::class,'update_user'])->name('update_user');
        Route::post('/profile/{id}/edit', [AktorController::class, 'edit_gambar'])->name('edit_gambar');
        Route::post('/update_user', [AktorController::class,'edit_user'])->name('edit_user');
        Route::post('/profile/{id}/ubah_pw', [AktorController::class,'ubah_pw'])->name('ubah_pw');

    });

    Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
        Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard');

        Route::get('/pemesanan_admin/{id}', [PemesananController::class, 'hal_pesan_admin'])->name('hal_pesan_admin');
        Route::post('/tambah_pemesanan_admin', [PemesananController::class, 'tambah_pemesanan_admin'])->name('tambah_pemesanan_admin');
        Route::get('/riwayat_admin', [PemesananController::class,'riwayat_admin'])->name('riwayat_admin');
        Route::get('/riwayat_admin/{id}/delete', [PemesananController::class,'delete_pemesanan_admin'])->name('delete_pemesanan_admin');
        Route::post('/bukti_admin/{id}', [PemesananController::class, 'bukti_admin'])->name('bukti_admin');
        Route::get('/invoice_admin/{id}', [PemesananController::class, 'invoice_admin'])->name('invoice_admin');
        Route::get('/cetak_bukti_admin/{id}', [PemesananController::class, 'cetak_butki_admin'])->name('cetak_butki_admin');

        Route::get('/', [AulaController::class, 'hal_utama'])->name('hal_utama');
        Route::get('/katalog', [PaketController::class,'daftar_katalog'])->name('daftar_katalog');
        Route::post('/tambah_katalog', [PaketController::class,'tambah_katalog'])->name('tambah_katalog');
        Route::get('/katalog/{id}/edit', [PaketController::class, 'update_katalog'])->name('update_katalog');
        Route::post('/katalog/{id}/update_katalog', [PaketController::class, 'edit_katalog'])->name('edit_katalog');
        Route::get('/katalog/{id}/delete', [PaketController::class, 'delete_katalog'])->name('delete_katalog');

        Route::get('/aula', [AulaController::class,'daftar_aula'])->name('daftar_aula');
        Route::post('/tambah_aula', [AulaController::class,'tambah_aula'])->name('tambah_aula');
        Route::get('/aula/{id}/edit', [AulaController::class, 'update_aula'])->name('update_aula');
        Route::post('/aula/{id}/update_aula', [AulaController::class, 'edit_aula'])->name('edit_aula');
        Route::get('/aula/{id}/delete', [AulaController::class, 'delete_aula'])->name('delete_aula');

        Route::get('/daftar_pembayaran', [PembayaranController::class,'daftar_pembayaran'])->name('daftar_pembayaran');
        Route::post('/tambah_pembayaran', [PembayaranController::class,'tambah_pembayaran'])->name('tambah_pembayaran');
        Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'update_pembayaran'])->name('update_pembayaran');
        Route::post('/pembayaran/{id}/update_pembayaran', [PembayaranController::class, 'edit_pembayaran'])->name('edit_pembayaran');
        Route::get('/pembayaran/{id}/delete', [PembayaranController::class, 'delete_pembayaran'])->name('delete_pembayaran');

        Route::get('/pemesanan', [PemesananController::class,'daftar_pemesanan'])->name('daftar_pemesanan');
        Route::get('/pemesanan/{id}/edit', [PemesananController::class,'update_pemesanan'])->name('update_pemesanan');
        Route::post('/akun/{id}/update_pemesanan', [PemesananController::class,'edit_pemesanan'])->name('edit_pemesanan');
        Route::get('/daftar_antrian', [PemesananController::class,'daftar_antrian'])->name('daftar_antrian');
        Route::get('/daftar_laporan', [PemesananController::class,'daftar_laporan'])->name('daftar_laporan');
        Route::get('/antrianedit/{id}', [PemesananController::class, 'pesanankonfirmasi'])->name('pesanankonfirmasi');
        Route::get('/antriandp/{id}', [PemesananController::class, 'pesanandp'])->name('pesanandp');
        Route::get('/antrianbatal/{id}', [PemesananController::class, 'pesananbatal'])->name('pesananbatal');
        Route::get('/laporan', [PemesananController::class,'laporan'])->name('laporan');
        Route::get('/cetak_laporan', [PemesananController::class,'cetak_laporan'])->name('cetak_laporan');

        Route::get('/akun_admin', [AktorController::class,'akun_admin'])->name('akun_admin');
        Route::get('/akun_cust', [AktorController::class,'akun_cust'])->name('akun_cust');
        Route::post('/tambah_akun', [AktorController::class,'tambah_akun'])->name('tambah_akun');
        Route::get('/akun/{id}/edit', [AktorController::class,'update_akun'])->name('update_akun');
        Route::post('/akun/{id}/update_akun', [AktorController::class,'edit_akun'])->name('edit_akun');
        Route::get('/akun/{id}/delete', [AktorController::class,'delete_akun'])->name('delete_akun');

        Route::get('/daftar_anggota', [AnggotaController::class,'daftar_anggota'])->name('daftar_anggota');
        Route::post('/tambah_anggota', [AnggotaController::class,'tambah_anggota'])->name('tambah_anggota');
        Route::get('/anggota/{id}/edit', [AnggotaController::class, 'update_anggota'])->name('update_anggota');
        Route::post('/anggota/{id}/update_anggota', [AnggotaController::class, 'edit_anggota'])->name('edit_anggota');
        Route::get('/anggota/{id}/delete', [AnggotaController::class, 'delete_anggota'])->name('delete_anggota');

        Route::post('/tambah_pengurus', [PengurusController::class,'tambah_pengurus'])->name('tambah_pengurus');
        Route::get('/daftar_pengurus', [PengurusController::class,'daftar_pengurus'])->name('daftar_pengurus');
        Route::get('/pengurus/{id}/edit', [PengurusController::class, 'update_pengurus'])->name('update_pengurus');
        Route::post('/pengurus/{id}/update_pengurus', [PengurusController::class, 'edit_pengurus'])->name('edit_pengurus');
        Route::get('/pengurus/{id}/delete', [PengurusController::class, 'delete_pengurus'])->name('delete_pengurus');


    });


// routes/web.php



Route::post('/login', [AktorController::class, 'login'])->name('login');
Route::post('/tambah_user', [AktorController::class, 'tambah_user'])->name('tambah_user');
Route::get('/logout', [AktorController::class, 'logout'])->name('logout');

Route::get('/', [AulaController::class, 'index'])->name('index');
Route::get('/aula1', [PaketController::class, 'aula1'])->name('aula1');
Route::get('/aula2', [PaketController::class, 'aula2'])->name('aula2');

Route::get('/informasi/{id}', [PaketController::class, 'ipaket'])->name('ipaket');
Route::get('/pembayaran', [PembayaranController::class, 'info_pembayaran'])->name('info_pembayaran');
Route::get('/tentang', [AnggotaController::class, 'anggota'])->name('anggota');
Route::get('/reservasi', [InformasiController::class, 'reservasi'])->name('reservasi');


