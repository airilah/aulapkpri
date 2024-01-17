<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            "nama"  => "admin",
            "alamat"  => "Bangkalan",
            "no_hp" => "084134353122",
            "email" => "admin@gmail.com",
            "password" => hash::make("admin"),
            "gambar" => "admin.jpg",
            "role" => "admin",
          ],[
            "nama"  => "anas",
            "alamat"  => "Bangkalan",
            "no_hp" => "083847086323",
            "email" => "anas@gmail.com",
            "password" => hash::make("anas"),
            "gambar" => "anas.jpg",
            "role" => "customer",
          ]]);
        DB::table('aulas')->insert([[
            "nama_aula"  => "Aula Gedung 1",
            "deskripsi"  => "lebih besar daripada aula 2",
            "gambar"  => "aula1.jpg",
          ],[
            "nama_aula"  => "Aula Gedung 2",
            "deskripsi"  => "lebih kecil daripada aula 1",
            "gambar"  => "aula2.jpg",
          ]]);

        // DB::table('cek_sedia')->insert([[
        //     "aula_id"  => "1",
        //     "pemesanan_id"  => " ",
        // ],[
        //     "aula_id"  => "2",
        //     "pemesanan_id"  => " ",
        // ]]);

        DB::table('pakets')->insert([[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 1",
            "nama_acara"  => "Resepsi",
            "harga"  => "4200000",
            "kursi"  => "500",
            "mic"  => "3",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Seperangkat kuade warna coklat dengan dekorasi dan karangan bunga, Baliho selamat datang dan mohon doa restu, Sound system di atas dan di bawah 1 unit, Kotak pundi/souvenir 2 unit, kotak kue 2 unit, dan rak piring 3 unit, Meja terima tamu dan taplak wiron 2 buah, Ruang untuk penyiapan konsumsi, Pengaturan kendaraan oleh Satpam, Genset (apabila listrik padam). ",
            "gambar"  => "aula1-pernikahan1.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 2",
            "nama_acara"  => "Resepsi",
            "harga"  => "4700000",
            "kursi"  => "750",
            "mic"  => "3",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Seperangkat kuade warna coklat dengan dekorasi dan karangan bunga, Baliho selamat datang dan mohon doa restu, Sound system di atas dan di bawah 1 unit, Kotak pundi/souvenir 2 unit, kotak kue 2 unit, dan rak piring 3 unit, Meja terima tamu dan taplak wiron 2 buah, Ruang untuk penyiapan konsumsi, Pengaturan kendaraan oleh Satpam, Genset (apabila listrik padam). ",
            "gambar"  => "aula1-resepsi.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 3",
            "nama_acara"  => "Resepsi (Prasmanan)",
            "harga"  => "4700000",
            "kursi"  => "50",
            "mic"  => "3",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Seperangkat kuade warna coklat dengan dekorasi dan karangan bunga, Baliho selamat datang dan mohon doa restu, Sound system di atas dan di bawah 1 unit, Kotak pundi/souvenir 2 unit, kotak kue 2 unit, dan rak piring 3 unit, Meja terima tamu dan taplak wiron 2 buah, Ruang untuk penyiapan konsumsi, Pengaturan kendaraan oleh Satpam, Genset (apabila listrik padam).",
            "gambar"  => "aula1-pernikahan.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 4",
            "nama_acara"  => "Rapat",
            "harga"  => "2000000",
            "kursi"  => "600",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 600 unit (tanpa meja) dan apabila meja kursi sebanyak 120 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila menggunakan dekorasi bunga dibebani biaya Rp 100.000, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 1.000.000",
            "gambar"  => "aula1-rapat.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 5",
            "nama_acara"  => "Seminar/Penataran",
            "harga"  => "2000000",
            "kursi"  => "600",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 600 unit (tanpa meja) dan apabila meja kursi sebanyak 120 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila menggunakan dekorasi bunga dibebani biaya Rp 100.000, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 1.000.000",
            "gambar"  => "aula1-seminar.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 6",
            "nama_acara"  => "Diklat",
            "harga"  => "2000000",
            "kursi"  => "600",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 600 unit (tanpa meja) dan apabila meja kursi sebanyak 120 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila menggunakan dekorasi bunga dibebani biaya Rp 100.000, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 1.000.000",
            "gambar"  => "aula1-diklat.jpg",
            ],[
            "aula_id"  => "1",
            "kategori"  => "Aula Gedung 1",
            "nama_paket"  => "paket 7",
            "nama_acara"  => "Wisuda",
            "harga"  => "2000000",
            "kursi"  => "600",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 600 unit (tanpa meja) dan apabila meja kursi sebanyak 120 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila menggunakan dekorasi bunga dibebani biaya Rp 100.000, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 1.000.000",
            "gambar"  => "aula1-wisuda.jpg",
            ],[
            "aula_id"  => "2",
            "kategori"  => "Aula Gedung 2",
            "nama_paket"  => "paket 8",
            "nama_acara"  => "Rapat",
            "harga"  => "1300000",
            "kursi"  => "100",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 100 unit (tanpa meja) dan apabila meja kursi sebanyak 65 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 750.000",
            "gambar"  => "aula2-rapat.jpg",
            ],[
            "aula_id"  => "2",
            "kategori"  => "Aula Gedung 2",
            "nama_paket"  => "paket 9",
            "nama_acara"  => "Seminar/Penataran",
            "harga"  => "1300000",
            "kursi"  => "100",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 100 unit (tanpa meja) dan apabila meja kursi sebanyak 65 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 750.000",
            "gambar"  => "aula2-seminar.jpg",
            ],[
            "aula_id"  => "2",
            "kategori"  => "Aula Gedung 2",
            "nama_paket"  => "paket 10",
            "nama_acara"  => "Diklat",
            "harga"  => "1300000",
            "kursi"  => "100",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 100 unit (tanpa meja) dan apabila meja kursi sebanyak 65 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 750.000",
            "gambar"  => "aula2-diklat.jpg",
        ],[
            "aula_id"  => "2",
            "kategori"  => "Aula Gedung 2",
            "nama_paket"  => "paket 11",
            "nama_acara"  => "Wisuda",
            "harga"  => "1300000",
            "kursi"  => "100",
            "mic"  => "2",
            "lama_sewa"  => "6",
            "fasilitas"  => "AC, Free Wifi, Kursi sebanyak 100 unit (tanpa meja) dan apabila meja kursi sebanyak 65 unit, Genset (apabila listrik padam), Seperangkat sound system dan mic 2 unit (sebelebihnya dibebani biaya Rp 50.000 per mic), Meja pimpinan rapat dan meja presensi + taplak wiron, Podium, tiang bendera, dan palu sidang, Apabila terdapat gladi bersih dibebani biaya tambhaan kebersihan Rp 300.000 (maksimal 4 jam tanpa sound system), Apabila menggunkaan LCD Projector dibebani biaya tambahan Rp 200.000, Apabila menggunakan ruang khusus tamu ber AC dibebani tambahan Rp 250.000, Khusus bagi KP-Ri yang melaksanakan rapat anggota dan diklat perkoperasian biaya sewa sebesar Rp 750.000",
            "gambar"  => "aula2-wisuda.jpg",
        ]]);

        DB::table('pembayarans')->insert([[
            "nama_metode"  => "Bank BRI",
            "no_rek"  => "0006-01-000884-56-9",
            "an"  => "PKP-RI KAB.BANGKALAN",
            "gambar"  => "bri.png",
          ],[
            "nama_metode"  => "Bank Jatim",
            "no_rek"  => "0253709618",
            "an"  => "PKP-RI KAB.BANGKALAN",
            "gambar"  => "jatim.png",
          ],[
            "nama_metode"  => "Bayar Langsung",
            "no_rek"  => " ",
            "an"  => " ",
            "gambar"  => "",
          ]]);

          DB::table('pemesanans')->insert([[
            "user_id"  => "2",
            "paket_id"  => "1",
            "pembayaran_id"  => "1",
            "tanggal_sewa"  => "2024-01-01",
            "jam_sewa"  => "09:00",
            "lama_sewa"  => "6",
            "tambah_kursi"  => "500",
            "tambah_mic"  => "3",
            "tambah_proyektor"  => "tidak",
            "kebersihan"  => "tidak",
            "ruang_transit"  => "tidak",
            "kuade_luar"  => "tidak",
            "gladi_bersih"  => "tidak",
            "total_harga"  => "4200000",
            "bukti_pembayaran"  => "",
            "keterangan"  => " ",
            "status"  => "Belum terverifikasi",
            ],[
            "user_id"  => "2",
            "paket_id"  => "1",
            "pembayaran_id"  => "1",
            "tanggal_sewa"  => "2024-02-01",
            "jam_sewa"  => "09:00",
            "lama_sewa"  => "6",
            "tambah_kursi"  => "750",
            "tambah_mic"  => "3",
            "tambah_proyektor"  => "tidak",
            "kebersihan"  => "tidak",
            "ruang_transit"  => "tidak",
            "kuade_luar"  => "tidak",
            "gladi_bersih"  => "tidak",
            "total_harga"  => "4700000",
            "bukti_pembayaran"  => "",
            "keterangan"  => " ",
            "status"  => "Belum terverifikasi",
        ]]);

        DB::table('penguruses')->insert([[
            "nama_pengurus"  => "Drs. H Edy Haryadi, M.Pd",
            "jabatan"  => "Ketua 1",
        ],[
            "nama_pengurus"  => "Aziz Syafiuddin, BSc, S.Sos",
            "jabatan"  => "Ketua 2",
        ],[
            "nama_pengurus"  => "Ciptaning Tekat, SKM, MM",
            "jabatan"  => "Sekretaris",
        ],[
            "nama_pengurus"  => "Mustakim, S.Pd",
            "jabatan"  => "Bendahara 1",
        ],[
            "nama_pengurus"  => "Nuzullah Qurfianto, SE",
            "jabatan"  => "Bendahara 2",
        ],[
            "nama_pengurus"  => "Drs. Ec.H Moh. Noer, MSA",
            "jabatan"  => "Koordinator",
        ],[
            "nama_pengurus"  => "Drs. H Edy Haryadi, M.Pd",
            "jabatan"  => "Anggota",
        ],[
            "nama_pengurus"  => "Achmad Riady, SH, MH",
            "jabatan"  => "Anggota",
        ]]);

        DB::table('anggotas')->insert([[
            "nama_anggota"  => "Tunas Harapan",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Pengayoman",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Pemda",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Teratai",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Sumber Bahagia",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Adil Makmur",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Sentosa",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Sejahtera",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bangkit",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Kopergu",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Anantakupa",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Anugerah",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Tunggal",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Api Alam",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bhakti Husada",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Dewi Sri",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Karya Bakti",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bima",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Sumber Rejeki",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bakti Mulia",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Makmur",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Pawiyatan",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Karya Dharma",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Karya Makmur",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bakti",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "KPPDK",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Melati",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Al-hidayah",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Barokah",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Mutiara",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Harapan",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Kokarperi",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Airdas",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Andini Jaya",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bahtera Kencana",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Tiara",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Smada",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Trunojoyo",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Eka Prasetya",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Swasembada",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Tutwurihandayani",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Disbunda",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Eka Karsa",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bhina Indag",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Citra",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Kopstik",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Ikhlas Beramal",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Beringin",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Harapan Kita",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Delima",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Rahmat",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Adiguna Sejahtera",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Wahana SMK Baru",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Bumi Permata Hati",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "BAPDA",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ],[
            "nama_anggota"  => "Tunas Mekar",
            "no"  => " ",
            "tanggal"  => "2024-02-01",
            "pukul"  => "09:00",
            "keterangan"  => " ",
        ]]);
    }
}
