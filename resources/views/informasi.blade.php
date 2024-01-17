<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKP-RI Kab. Bangkalan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Navbar  -->
    @include('template.nav')

    <!-- Content -->
    <section class="container-fluid">
        <div class="container mx-auto mt-3 py-1">
            <svg xmlns="http://www.w3.org/2000/svg"  class="d-none">
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                <div>
                    <svg class="bi flex-shrink-0 me-2" role="img" width="16" height="16" fill="currentColor" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <strong>Peringatan!!</strong> Baca ketentuan umum terlebih dahulu sebelum melakukan pemesanan. <a href="#simple-list-item-1" class="alert-link" id="simple-list-example">Lanjut baca</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <h5 class="fw-semibold">Informasi Paket</h5>
            <div class="container p-0">
                <div class="card mb-3 rounded-0">
                    <div class="row g-0">
                      <div class="col-md-7 p-3">
                        <img src="{{ asset('assets/img/'.$paket->gambar) }}" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-5 p-3">
                        <div class="card-body px-0 d-flex flex-column justify-content-end">
                            <div class="row g-0">
                                <p class="mb-0 col-4" style="font-size: 16px;">Kriteria Acara</p>
                                <p class="mb-0 col-1" style="font-size: 16px;">:</p>
                                <p class="mb-0 col-7" style="font-size: 16px;">{{$paket->nama_acara}}</p>
                            </div>
                            <div class="row g-0">
                                <p class="mb-0 col-4" style="font-size: 16px;">Kapasitas</p>
                                <p class="mb-0 col-1" style="font-size: 16px;">:</p>
                                <p class="mb-0 col-7" style="font-size: 16px;">{{$paket->kursi}}</p>
                            </div>
                            <div class="row g-0">
                                <p class="mb-0 col-4" style="font-size: 16px;">Fasilitas</p>
                                <p class="mb-0 col-1" style="font-size: 16px;">:</p>
                                <ul class="mb-0 col-7 ps-3">
                                    @foreach(explode(', ', $paket->fasilitas) as $fasilitas)
                                            <li style="font-size: 16px;">{{ $fasilitas }}</li>
                                        @endforeach
                                </ul>
                            </div>
                            <div class="row g-0">
                                <p class="mb-0 col-4" style="font-size: 16px;">Harga</p>
                                <p class="mb-0 col-1" style="font-size: 16px;">:</p>
                                <p class="mb-0 col-7" style="font-size: 16px;">{{ 'Rp '. number_format($paket->harga, 0, ',', '.') }}</p>
                            </div>
                            <br>
                            @if (Auth::user())

                            @if (Auth::check() && Auth::user()->role == 'customer')
                                <div class="d-flex justify-content-end">
                                    <a type="button" class="btn btn-info p-3" href="/pemesanan/{{ $paket->id }}">Pesan Sekarang</a>
                                </div>
                            @else
                            <div class="d-flex justify-content-end">
                                <a type="button" class="btn btn-info p-3" href="/pemesanan_admin/{{ $paket->id }}">Pesan Sekarang</a>
                            </div>
                            @endif
                            @endif
                            @if (!Auth::user())
                                <div class="row g-0 mt-3">
                                    <p class="mb-0 fw-semibold alert alert-danger" style="font-size: 16px;">Silahkan login terlebih dahulu untuk pemesanan!</p>
                                </div>
                            @endif
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container scrollspy-example" data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" tabindex="0">
        <h5 class="fw-bold mb-3" id="simple-list-item-1">Penting Dibaca!!</h5>
        <div class="container p-3 bg-warning">
            <h5 class="fw-semibold">Biaya Tambahan</h5>
            <ul>
                <li>Pemakaian Pagi/Siang/Malam maksimal 6 jam, selebihnya dikenakan tambahan sebesar Rp. 200.000 per - tiap jam</li>
                <li>Mic 3 unit, selebihnya dikenakan biaya Rp. 50.000 per unit</li>
                <li>Penambahan Kursi per - 1 unit Rp. 3.000</li>
                <li>Apabila menggunakan kuade luar ada tambahan Rp. 300.000</li>
                <li>Apabila menggunakan ruangan khusus transit/ruang tamu ber AC dibebani biaya tambahan Rp. 250.000</li>
                <li>Biaya Kebersihan Rp. 300.000</li>
            </ul>
            <h5 class="fw-semibold">Ketentuan Umum</h5>
            <ul>
                <li>Uang muka sewa minimal sebesar Rp. 400.000</li>
                <li>Pelunasan uang sewa secara keseluruhan paling lambat 24 jam (H-1) sebelum hari pelaksaan</li>
                <li>Apabila terjadi pembatalan dari pihak penyewa, maka uang muka tidak dapat diminta kembali</li>
                <li>Pemasangan segala bentuk iklan, reklame, sponsor dalam bentuk umbul-umbul, spanduk, poster, banner dan lainnya yang dapat menimbulkan beban pajak ditanggung oleh pihak penyewa</li>
                <li>Pengurusan dan penyelesaian segala macam bentuk izin keramaian dan izin pemakaian lahan parkir menjadi tanggung jawab penyewa</li>
                <li>Untuk menjaga keindahan Aula/Gedung tidak diperbolehkan menempelkan segala hiasan/tulisan dengan paku, lem, solasi, dan sejenisnya</li>
                <li>PKP-RI tidak bertanggung jawab (mengganti) atas segala kehilangan barang/kendaraan pengunjung selama kegiatan berlangsung</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    @include('template.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
