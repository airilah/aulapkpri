<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('index') }}">
            <img src="{{ asset('assets/img/normal_koperasi.png') }}" alt="Logo" width="34" height="34"
                class="d-inline-block align-text-top">
            PKP-RI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-medium" aria-current="page" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Katalog
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('aula1') }}">Gedung Aula 1</a></li>
                        <li><a class="dropdown-item" href="{{ route('aula2') }}">Gedung Aula 2</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-medium dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('reservasi') }}">Reservasi</a></li>
                        <li><a class="dropdown-item" href="{{ route('info_pembayaran') }}">Pembayaran</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('anggota') }}">Tentang Kami</a>
                </li>
                @if (Auth::user())
                @if (Auth::check() && Auth::user()->role == 'customer')
                {{-- Authenticated user --}}
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('riwayat') }}">Data Pemesanan</a>
                </li>
                @else
                    {{-- Admin --}}
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('riwayat_admin') }}">Data Pemesanan</a>
                    </li>
                @endif
                @endif

            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                @if (!Auth::user())
                    <li class="nav-item">
                        <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#">Daftar</a>
                    </li>
                @endif
                @if (Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-medium dropdown-toggle d-flex align-items-center ms-2" href="#" style="font-size: 1rem" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                            <img  src="{{ asset('assets/img/upload/'.auth()->user()->gambar) }}" alt="Logo" width="34" height="34"
                                class="d-inline-block align-text-top bg-white rounded-circle">
                            {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile/{{ auth()->user()->id }}/edit">Profile</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ubah-password" href="#" >Ubah Password</a></li>
                            @if ( auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Tampilan Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium d-flex align-items-center icon-link-hover" href="{{ route('logout') }}" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffffff" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                              </svg>
                            Logout
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<!-- Modal  ubah-pw-->
@if (Auth::user())
    <div class="modal fade" id="ubah-password" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{-- <form action="/profile/{id}/edit" method="post" enctype="multipart/form-data"> --}}
            <form action="{{ route('ubah_pw', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Password</h5>
                    </div>
                    <div class="modal-body">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control shadow-none">
                    </div>
                    <div class="modal-body">
                        <label for="password_baru" class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control shadow-none">
                    </div>
                    <div class="modal-body">
                        <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmasi_password_baru" class="form-control shadow-none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success text-white shadow-none" name="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif


<!-- Modal  Login-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
        <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">
            <img src="{{ asset('assets/img/normal_koperasi.png') }}" alt="Logo" width="36" height="36"
                class="d-inline-block align-text-top">
                Login
            </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('login') }}" method="POST">
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="nama@gmail.com" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info rounded">Login</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal  Daftar-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background-color: var(--black);" data-bs-theme="dark">
        <h1 class="modal-title fs-4 fw-bold text-white" id="exampleModalLabel">
            <img src="{{ asset('assets/img/normal_koperasi.png') }}" alt="Logo" width="36" height="36"
                class="d-inline-block align-text-top">
                Daftar
            </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('tambah_user') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi nama anda">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Isi alamat anda">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="tel" class="form-control" name="no_hp" id="no_hp" placeholder="08xxxxxxxxxx">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="nama@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword">
                </div>
                    <input type="text" class="form-control" name="role" id="role" value="customer" hidden>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info rounded">Daftar</button>
            </div>
        </form>
    </div>
    </div>
</div>
