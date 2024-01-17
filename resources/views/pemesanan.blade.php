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
            <h5 class="fw-semibold mb-4">Pemesanan Aula Gedung</h5>
            <div class="container p-0">
                <div class="row g-0">
                    <div class="col-md-6">
                        <p class="fw-medium" style="font-size: 20px;">Data Pemesan</p>
                        <div class="container d-flex justify-content-start p-0">
                            <img src="{{ asset('assets/img/upload/'.auth()->user()->gambar) }}" class="img-thumbnail m-0" alt="..." width="110" height="130">
                            <div class="container">
                                <p class="fw-medium mb-0" style="font-size: 20px;">{{ auth()->user()->nama }}</p>
                                <p class="mb-0">{{ auth()->user()->no_hp }}</p>
                                <p class="mb-0">{{ auth()->user()->email }}</p>
                                <p class="mb-0">{{ auth()->user()->alamat }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p class="fw-medium" style="font-size: 20px;">Paket Sewa Yang Dipilih :</p>
                        <div class="container mx-0 px-0" >
                            <div class="card mb-3 rounded-0">
                                <div class="row g-0">
                                    <div class="col-md-6 p-3">
                                    <img src="{{ asset('assets/img/'.$paket->gambar) }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col-md-6 p-3">
                                    <div class="card-body p-0">
                                        <p class="fw-medium m-0">{{$paket->kategori}}</p>
                                        <p class="m-0">{{$paket->nama_acara}}</p>
                                        <p class="m-0">{{$paket->kursi}}</p>
                                        <p class="mt-md-4 mb-md-0 fw-bold text-end">{{ 'Rp '. number_format($paket->harga, 0, ',', '.') }}</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="container mx-auto">
    <div class="container scrollspy-example" data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" tabindex="0">
        @if (Auth::check() && Auth::user()->role == 'customer')
        <form action="/tambah_pemesanan"  method="post">
        @else
        <form action="/tambah_pemesanan_admin"  method="post">
        @endif
            @csrf
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" hidden >
                <input type="text" class="form-control" id="paket_id" name="paket_id" value="{{$paket->id}}" hidden>
            <div class="row mb-3">
                <label for="tanggal_sewa" class="col-lg-2 col-form-label">Tanggal Sewa</label>
                <div class="col-lg-4">
                    <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
                    <span id="peringatan_tanggal" style="color: red;"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="jam_sewa" class="col-lg-2 col-form-label">Jam Sewa</label>
                <div class="col-lg-4">
                <input type="time" class="form-control" id="jam_sewa" name="jam_sewa" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="lama_sewa" class="col-lg-2 col-form-label">Lama Sewa</label>
                <div class="col-lg-4">
                <input type="number" class="form-control" id="lama_sewa" name="lama_sewa" aria-describedby="lama_sewa" value="{{$paket->lama_sewa}}" min="{{$paket->lama_sewa}}" step="1" oninput="validateLamaSewa(this)" required>
                <div id="lama_sewa" class="form-text">Tambahkan jika ingin lebih dari {{$paket->lama_sewa}} jam dikenakan biaya tambahan Rp. 200.000 per jam</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tambah_kursi" class="col-lg-2 col-form-label">Tambah Kursi</label>
                <div class="col-lg-4">
                <input type="number" class="form-control" id="tambah_kursi" name="tambah_kursi" aria-describedby="tambah_kursi" value="{{$paket->kursi}}" min="{{$paket->kursi}}" step="1" oninput="validateKursi(this)" required>
                <div id="tambah_kursi" class="form-text">Tambahkan jika ingin lebih dari {{$paket->kursi}} kursi dikenakan biaya tambahan Rp. 3.000 per unit</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tambah_mic" class="col-lg-2 col-form-label">Tambah Mic</label>
                <div class="col-lg-4">
                <input type="number" class="form-control" name="tambah_mic" id="tambah_mic" aria-describedby="tambah_mic" value="{{$paket->mic}}" min="{{$paket->mic}}" step="1"  oninput="validateMic(this)" required>
                <div id="tambah_mic" class="form-text">Tambahkan jika ingin lebih dari {{$paket->mic}} mic dikenakan biaya tambahan Rp. 50.000 per unit</div>
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-lg-2 pt-0">Pakai Proyektor</legend>
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tambah_proyektor" id="proyektor1" value="iya" required>
                        <label class="form-check-label" for="proyektor">
                        Iya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tambah_proyektor" id="proyektor2" value="tidak" required>
                        <label class="form-check-label" for="proyektor" aria-describedby="pakai-proyektor">
                        Tidak
                        </label>
                    </div>
                    <div id="pakai-proyektor" class="form-text">Pemakaian proyektor dikenakan biaya tambahan
                        Rp. 200.000</div>
                </div>
            </fieldset>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-lg-2 pt-0">Pakai Kebersihan</legend>
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kebersihan" id="kebersihan1" value="iya" required>
                        <label class="form-check-label" for="kebersihan">
                        Iya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kebersihan" id="kebersihan2" value="tidak" required>
                        <label class="form-check-label" for="kebersihan" aria-describedby="pakai-kebersihan">
                        Tidak
                        </label>
                    </div>
                    <div id="pakai-kebersihan" class="form-text">Pemakaian kebersihan oleh pihak PKPRI dikenakan
                        biaya tambahan Rp. 300.000</div>
                </div>
            </fieldset>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-lg-2 pt-0">Pakai Ruang Transit</legend>
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ruang_transit" id="ruang_transit1" value="iya" required>
                        <label class="form-check-label" for="ruang_transit">
                        Iya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="ruang_transit" id="ruang_transit2" value="tidak" required>
                        <label class="form-check-label" for="ruang_transit" aria-describedby="pakai-ruang-transit">
                        Tidak
                        </label>
                    </div>
                    <div id="pakai-ruang-transit" class="form-text">Pemakaian ruang transit dikenakan biaya tambahan
                        Rp. 250.000</div>
                </div>
            </fieldset>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-lg-2 pt-0">Pakai Kuade Luar</legend>
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kuade_luar" id="kuade_luar1" value="iya" required>
                        <label class="form-check-label" for="kuade_luar">
                        Iya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="kuade_luar" id="kuade_luar2" value="tidak" required>
                        <label class="form-check-label" for="kuade_luar" aria-describedby="pakai-ruang-transit">
                        Tidak
                        </label>
                    </div>
                    <div id="pakai-ruang-transit" class="form-text">Pemakaian Kuade Luar dikenakan biaya tambahan
                        Rp. 300.000</div>
                </div>
            </fieldset>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-lg-2 pt-0">Pakai Gladi Bersih</legend>
                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gladi_bersih" id="gladi_bersih1" value="iya" required>
                        <label class="form-check-label" for="gladi_bersih">
                        Iya
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gladi_bersih" id="gladi_bersih2" value="tidak" required>
                        <label class="form-check-label" for="gladi_bersih" aria-describedby="pakai-gladi-bersih">
                        Tidak
                        </label>
                    </div>
                    <div id="pakai-gladi-bersih" class="form-text">Pelaksanaan gladi  bersih (H-1) dikenakan biaya
                        tambahan Rp. 250.000</div>
                </div>
            </fieldset>
            <div class="row mb-3">
                <label for="total_harga" class="col-lg-2 col-form-label">Harga</label>
                <div class="col-lg-4">
                    <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
                    <span id="harga-info" class="form-text">Jumlah total</span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="pembayaran_id" class="col-lg-2 col-form-label">Pembayaran</label>
                <div class="col-lg-4">
                    <select name="pembayaran_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px" required>
                        <option selected hidden>Pilih Metode Pembayaran</option>
                        @foreach ($pembayaran as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_metode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="keterangan" class="col-lg-2 col-form-label">Keterangan</label>
                <div class="col-lg-4">
                <textarea class="form-control" placeholder="Isi keterangan yang diinginkan" id="keterangan" name="keterangan" style="height: 100px"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success py-2 px-4 rounded-0" onclick="return confirm('Apakah benar dengan reservasi Anda?')">Kirim</button>
            <a href="/" class="btn btn-secondary py-2 px-4 rounded-0">Batal</a>
        </form>
    </div>

    <!-- Footer -->
    @include('template.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script>
        function calculatePrice() {
            // Get values from form fields
            var lamaSewa = parseFloat(document.getElementById('lama_sewa').value) || 0;
            var tambahKursi = parseFloat(document.getElementById('tambah_kursi').value) || 0;
            var tambahMic = parseFloat(document.getElementById('tambah_mic').value) || 0;

            var pakaiProyektor = document.querySelector('input[id="proyektor1"]').checked ? 200000 : 0;
            var pakaiKebersihan = document.querySelector('input[id="kebersihan1"]').checked ? 300000 : 0;
            var pakaiRuangTransit = document.querySelector('input[id="ruang_transit1"]').checked ? 250000 : 0;
            var pakaiKuadeLuar = document.querySelector('input[id="kuade_luar1"]').checked ? 300000 : 0;
            var pakaiGladiBersih = document.querySelector('input[id="gladi_bersih1"]').checked ? 250000 : 0;

            // Calculate additional charges
            var additionalCharges = (lamaSewa - {{$paket->lama_sewa}}) * 200000 +
                (tambahKursi - {{$paket->kursi}}) * 3000 +
                (tambahMic - {{$paket->mic}}) * 50000;

            // Calculate total price
            var totalTambahan =  additionalCharges + pakaiProyektor + pakaiKebersihan + pakaiRuangTransit + pakaiKuadeLuar + pakaiGladiBersih;
            var hargaAula = {{$paket->harga}}
            // Calculate total price
            var totalPrice =  hargaAula + additionalCharges + pakaiProyektor + pakaiKebersihan + pakaiRuangTransit + pakaiKuadeLuar + pakaiGladiBersih;

            // Use toFixed() to round to 0 decimal places and convert to string
            var formattedTotalPrice = totalPrice.toFixed(0);

            document.getElementById('total_harga').value = formattedTotalPrice.toLocaleString();
            document.getElementById('harga-info').innerHTML = 'Tambahan harga: Rp ' + totalTambahan.toLocaleString();

        }

        // Attach the calculatePrice function to relevant input events
        document.getElementById('lama_sewa').addEventListener('input', calculatePrice);
        document.getElementById('tambah_kursi').addEventListener('input', calculatePrice);
        document.getElementById('tambah_mic').addEventListener('input', calculatePrice);
        document.querySelectorAll('input[name="tambah_proyektor"]').forEach(function (element) {
            element.addEventListener('change', calculatePrice);
        });
        document.querySelectorAll('input[name="kebersihan"]').forEach(function (element) {
            element.addEventListener('change', calculatePrice);
        });
        document.querySelectorAll('input[name="ruang_transit"]').forEach(function (element) {
            element.addEventListener('change', calculatePrice);
        });
        document.querySelectorAll('input[name="kuade_luar"]').forEach(function (element) {
            element.addEventListener('change', calculatePrice);
        });
        document.querySelectorAll('input[name="gladi_bersih"]').forEach(function (element) {
            element.addEventListener('change', calculatePrice);
        });

        // Initial calculation on page load
        calculatePrice();

        document.addEventListener('DOMContentLoaded', function() {
        calculatePrice();
        });

    </script>


    {{-- <script>
        document.getElementById('tanggal_sewa').addEventListener('change', function() {
            var selectedDate = this.value;

            // Mengambil semua tanggal_sewa dari database (Anda mungkin perlu menyesuaikan metode pengambilan data)
            var tanggalSewaDatabase = {!! json_encode(DB::table('pemesanans')->pluck('tanggal_sewa')) !!};

            // Memeriksa apakah tanggal yang dipilih ada di dalam array tanggalSewaDatabase
            if (tanggalSewaDatabase.includes(selectedDate)) {
                document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi';
            } else {
                document.getElementById('peringatan_tanggal').innerText = '';
            }
        });
    </script> --}}

    {{-- <script>
        document.getElementById('tanggal_sewa').addEventListener('change', function () {
            var selectedDate = this.value;

            // Mengambil semua data pemesanan dari database (termasuk tanggal_sewa dan paket_id)
            var pemesananData = {!! json_encode(DB::table('pemesanans')->select('tanggal_sewa', 'paket_id')->get()) !!};

            // Mengecek apakah tanggal yang dipilih sudah tereservasi
            var isDateReserved = pemesananData.some(function (data) {
                var isAulaGedung1 = (data.paket_id >= 1 && data.paket_id <= 7);
                var isAulaGedung2 = (data.paket_id >= 8 && data.paket_id <= 11);

                // Memeriksa kondisi dan menampilkan pesan sesuai hasil pengecekan
                if (data.tanggal_sewa === selectedDate) {
                    if (isAulaGedung1) {
                        document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 1, Kosong untuk Aula Gedung 2';
                        return true;
                    }
                     else if (isAulaGedung2) {
                        document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 2, Kosong untuk Aula Gedung 1';
                        return true;
                    }
                    else if (isAulaGedung1, isAulaGedung2 ) {
                        document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 1 dan Aula Gedung 2';
                        return true;
                    }
                }

                return false;
            });

            // Jika tanggal tidak tereservasi, hapus pesan peringatan
            if (!isDateReserved) {
                document.getElementById('peringatan_tanggal').innerText = '';
            }
        });
    </script> --}}

    <script>
        document.getElementById('tanggal_sewa').addEventListener('change', function () {
        var selectedDate = this.value;

        // Mengambil semua data pemesanan dari database (termasuk tanggal_sewa dan paket_id)
        var pemesananData = {!! json_encode(DB::table('pemesanans')->select('tanggal_sewa', 'paket_id')->get()) !!};

        // Mengecek apakah tanggal yang dipilih sudah tereservasi
        var isDateReservedAulaGedung1 = false;
        var isDateReservedAulaGedung2 = false;

        pemesananData.forEach(function (data) {
            var isAulaGedung1 = (data.paket_id >= 1 && data.paket_id <= 7);
            var isAulaGedung2 = (data.paket_id >= 8 && data.paket_id <= 11);

            if (data.tanggal_sewa === selectedDate) {
                if (isAulaGedung1) {
                    isDateReservedAulaGedung1 = true;
                } else if (isAulaGedung2) {
                    isDateReservedAulaGedung2 = true;
                }
            }
        });

        // Menampilkan pesan sesuai hasil pengecekan
        if (isDateReservedAulaGedung1 && isDateReservedAulaGedung2) {
            document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 1 dan Aula Gedung 2';
        } else if (isDateReservedAulaGedung1) {
            document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 1, Kosong untuk Aula Gedung 2';
        } else if (isDateReservedAulaGedung2) {
            document.getElementById('peringatan_tanggal').innerText = 'Tanggal tersebut sudah tereservasi untuk Aula Gedung 2, Kosong untuk Aula Gedung 1';
        } else {
            // Jika tanggal tidak tereservasi, hapus pesan peringatan
            document.getElementById('peringatan_tanggal').innerText = '';
        }
    });

    </script>



    <script>
        function validateLamaSewa(input) {
            var initialLamaSewa = {{$paket->lama_sewa}};
            var enteredValue = parseInt(input.value, 10);

            if (enteredValue < initialLamaSewa) {
                input.value = initialLamaSewa;
            }
        }
    </script>
    <script>
        function validateKursi(input) {
            var initialKursi = {{$paket->kursi}};
            var enteredValue = parseInt(input.value, 10);

            if (enteredValue < initialKursi) {
                input.value = initialKursi;
            }
        }
    </script>
    <script>
        function validateMic(input) {
            var initialMic = {{$paket->mic}};
            var enteredValue = parseInt(input.value, 10);

            if (enteredValue < initialMic) {
                input.value = initialMic;
            }
        }
    </script>

</body>

</html>
