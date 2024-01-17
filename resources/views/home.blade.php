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
        <div class="acuan-bg">
            <div class="banner">
                @if (session()->has('tambah_user'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_user') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="text-center position-relative top-50 start-50 translate-middle opacity-75 rounded-4 " style="width: 50%">
                    {{-- <h2 class="text-bold text-dark bg-white container opacity-75 rounded-4">Selamat Datang Di PKPRI KAB.BANGKALAN</h2> --}}
                    <h3 class="text-bold text-white fw-bold">WEBSITE PKP-RI BANGKALAN</h3>
                    <h6 class="text-bold text-white">Daftarkan Diri dan Lakukan Pemesanan</h6>

                    <a class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#">Daftar</a>
                </div>
                <div class="container mx-auto p-5 bg-white shadow-lg position-absolute bottom-0 start-50 translate-middle-x">
                    <h6 class="fw-medium">Silahkan Lihat Ketersediaan Aula Gedung :</h6>
                    <form action="{{ route('index') }}" method="GET" class="d-flex flex-wrap justify-content-between">
                        @csrf
                        <div class="col-md-4">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text btn btn-success" id="addon-wrapping">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-list-task" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
                                        <path
                                            d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
                                        <path fill-rule="evenodd"
                                            d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
                                    </svg>
                                </span>
                                <select class="form-select" id="inputGroupSelect01" name="aula">
                                    <option selected>Pilih Kategori</option>
                                    @foreach ($kategori as $key => $value)
                                        <option value="{{ $key }}" {{ optional(request())->input('aula') == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text btn btn-success" id="addon-wrapping">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-calendar3" viewBox="0 0 16 16">
                                        <path
                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                        <path
                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                </span>
                                <input type="date" class="form-control" placeholder="Pilih Tanggal"
                                    aria-label="Pilih Tanggal" aria-describedby="addon-wrapping" name="tanggal" >
                                    {{-- value="{{ $request->get('tanggal') }}" --}}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group flex-nowrap">
                                <button  class="btn btn-info form-control">Cari Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <h5 class="fw-medium p-4">Pilih Aula Gedung :</h5>
        <div class="row" id="aulaContainer">
            @foreach ($aula as $item)
                @if($item->id == 1)
                    <div class="col-sm-6 mb-3 mb-sm-0" id="aula1">
                        <div class="card card-efek p-3">
                            <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleAutoplaying1" data-bs-slide="fade" data-bs-interval="3000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" >
                                        <img src="{{ asset('assets/img/aula1-rapat.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula1-diklat.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula1-pernikahan.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula1-resepsi.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula1-seminar.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula1-wisuda.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying1" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying1" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_aula }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <a href="aula1" class="btn btn-info" style="border-radius: 0;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @foreach ($aula as $item)
                @if($item->id == 2)
                    <div class="col-sm-6 mb-3 mb-sm-0" id="aula2">
                        <div class="card card-efek p-3">
                            <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleAutoplaying2" data-bs-slide="fade" data-bs-interval="3000">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" >
                                        <img src="{{ asset('assets/img/aula2-diklat.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula2-wisuda.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula2-seminar.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula2-rapat.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                    <div class="carousel-item" >
                                        <img src="{{ asset('assets/img/aula2.jpg') }}" class="card-img-top" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying2" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying2" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_aula }}</h5>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                                <a href="aula2" class="btn btn-info" style="border-radius: 0;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <h5 class="fw-medium p-4 mt-4">Selamat Datang di Website :</h5>
        <div class="container p-0 m-0">
            <div class="row ps-4">
                <div class="col-sm-7">
                    {{-- <div> --}}
                        <h2>AULA GEDUNG PKP-RI BANGKALAN</h2><br>
                        <p class="indented-paragraph mb-0">PKP-RI berkepanjangan dari Pusat Koperasi Pegawai Republik Indonesia. Gedung Aula PKP-RI Bangkalan adalah sebuah fasilitas yang prestisius dan serbaguna yang menjadi pusat kegiatan berbagai acara di wilayah Bangkalan. Dengan arsitektur yang megah dan desain yang modern, gedung ini menjadi landmark penting bagi masyarakat setempat. Gedung Aula PKP-RI Bangkalan menyediakan ruang serbaguna yang dapat digunakan untuk berbagai acara seperti Acara Resepsi, Pernikahan, Rapat, Seminar, Penataran, Diklat, Wisuda dan acara khusus lainnya.</p><br>
                        <p class="indented-paragraph mb-0">Fasilitas dalam Gedung Aula mencakup ruang pertemuan yang luas, dilengkapi dengan peralatan audio-visual modern untuk mendukung kelancaran acara. Selain itu, gedung ini juga menyediakan fasilitas proyektor, kebersihan, ruang transit, area parkir yang memadai, serta layanan gladi bersih untuk memastikan bahwa setiap acara berjalan dengan sukses.</p><br>
                        <p class="indented-paragraph mb-0   ">Gedung Aula PKP-RI Bangkalan bukan hanya sekadar tempat untuk mengadakan acara, tetapi juga menjadi simbol kemajuan dan perkembangan di daerah tersebut. Dengan pelayanan yang profesional dan suasana yang nyaman, gedung ini menjadi pilihan utama bagi berbagai organisasi, perusahaan, dan komunitas yang menginginkan tempat yang representatif untuk menyelenggarakan berbagai kegiatan dan perayaan.</p>
                    {{-- </div> --}}
                </div>
                <div class="col-sm-4 p-1 card-efek">
                    {{-- <div> --}}
                        <img src="{{ asset('assets/img/home1.jpg') }}" alt="..." class="img-fluid">
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        <h5 class="fw-medium p-4 mt-4">Tempat PKP-RI Bangkalan :</h5>
        <div class="row" id="aulaContainer">
            <div class="col-sm-12 mb-3 mb-sm-0 card card-efek p-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d281.2253299740016!2d112.74983739260833!3d-7.024635083531738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd80f62bbd566d1%3A0xc7268430ecc45dac!2sKoperasi%20KPRI%20Kab%20Bangkalan!5e0!3m2!1sid!2sid!4v1704261433808!5m2!1sid!2sid" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>

</html>
