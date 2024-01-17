<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKP-RI Kab. Bangkalan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Add this to your head section -->
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
        <div class="container mx-auto mt-3 p-5 bg-white shadow-lg">
            <h5 class="fw-semibold">Pilih Paket Sewa Aula Gedung :</h5>
            <form action="{{ route('aula2') }}" method="GET" class="d-flex flex-wrap justify-content-between">
                @csrf
                <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text btn btn-success" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-list-task" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
                                <path
                                    d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
                                <path fill-rule="evenodd"
                                    d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
                            </svg>
                        </span>
                        <select class="form-select" id="inputGroupSelect01" name='paket'>
                            <option selected>Pilih Paket</option>
                            @foreach ($kategori as $key => $value)
                                @php
                                    $paketAula2 = $paket->where('aula_id', 2)->pluck('id')->toArray();
                                @endphp
                                @if (in_array($key, $paketAula2))
                                <option value="{{ $key }}" {{ optional(request())->input('paket') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text btn btn-success" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                              </svg>
                        </span>
                        <select class="form-select" id="inputGroupSelect02" name="harga">
                            <option selected>Pilih Rentang Harga</option>
                            @foreach ($harga as $range => $value)
                                <option value="{{ $range }}" {{ optional(request())->input('harga') == $range ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group flex-nowrap">
                        <button class="btn btn-info form-control">Cari Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container">
        <div class="row my-5">
            @foreach ($paket as $item)
                @if($item->aula_id == 2)
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <a class="card card-efek p-3 text-decoration-none"  href="/informasi/{{ $item->id }}">
                            <img src="{{ asset('assets/img/'.$item->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">{{ $item->kategori }}</h5>
                                <p class="card-text m-0">Acara: {{ $item->nama_acara}}</p>
                                <p class="card-text m-0">Kursi: {{ $item->kursi }}</p>
                                <h5 class="card-title mt-3 fw-bold text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</h5>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    @include('template.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <!-- Add these scripts before the closing body tag -->

</body>

</html>
