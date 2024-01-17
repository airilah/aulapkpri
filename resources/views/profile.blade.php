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
    <style>
        img {
            /* border: 2px solid;  */
            border-radius: 20%;
            margin-right: auto;
            margin-left: auto
        }
        .conten {
            position: relative;
            margin-right: auto;
            margin-left: auto;
            width: 50%;
        }
        .image {
            opacity: 1;
            display: block;
            width: 20% ;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%)
        }
        .conten:hover .image {
            opacity: 0.3;
        }
        .conten:hover .middle {
            opacity: 1;
        }
    </style>
    </head>

<body>
    <!-- Navbar  -->
    @include('template.nav')

        <div class="container mx-auto">
            <div class="p-3">
                <div class="card mb-4 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        @if (session()->has('edit_akun'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('edit_akun') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('edit_gambar'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('edit_gambar') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="conten">
                            <img id="profileImage" src="{{ asset('assets/img/upload/'.auth()->user()->gambar) }}" alt="foto" class="image" width="100">
                            <!-- <img id="profileImage" src="../../dist/img/profile/anas.jpg" alt="profile" class="image" width="100"> -->
                            <div class="middle">
                                <div class="text">
                                    <button type="button" class="btn btn-outline-dark w-10 shadow-none" data-bs-toggle="modal" data-bs-target="#image-profil">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 p-3 align-items-center">
                        <div class="">
                            <form action="/update_user" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-body">
                                        @foreach ($user as $item)
                                        @if($item->id == auth()->user()->id)
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold" for="nama"> Nama </label>
                                                <input type="text" id="nama" name="nama" class="form-control shadow-none" value="{{ $item->nama }}" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold" for="email"> E-mail </label>
                                                <input type="text" id="email" name="email" class="form-control shadow-none" value="{{ $item->email }}" required>
                                                <span id="error_email" style="color: red;"></span>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold"> Telepon </label>
                                                <input type="text" id="no_hp" name="no_hp" class="form-control shadow-none" value="{{ $item->no_hp }}" required>
                                                <span id="error_no_hp" style="color: red;"></span>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label fw-bold"> Alamat </label>
                                                <input type="text" id="alamat" name="alamat" class="form-control shadow-none" value="{{ $item->alamat }}" required>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                <div class="modal-footer">
                                    <button id="submitButton" name="kirim" class="btn btn-outline-dark w-175 shadow-none" disabled>Simpan</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="image-profil" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            {{-- <form action="/profile/{id}/edit" method="post" enctype="multipart/form-data"> --}}
            <form action="{{ route('edit_gambar', ['id' => auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Image</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            {{-- <input type="hidden" id="nama" name="nama" class="form-control shadow-none" value="" required> --}}
                            <input type="file" name="gambar" class="form-control shadow-none" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-success text-white shadow-none" name="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>


    <!-- Footer -->
    @include('template.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
    </script>


        {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}

        <script>
            document.querySelector('form').addEventListener('submit', function (e) {
                var telepon = document.getElementById('no_hp').value;
                var email = document.getElementById('email').value;

                var teleponValid = /^\d{10,12}$/;  // Validasi nomor telepon (10-12 digit)
                var emailValid = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;  // Validasi alamat email

                var error_no_hp = document.getElementById('error_no_hp');
                var errorEmail = document.getElementById('error_email');

                // Reset pesan error sebelum memvalidasi lagi
                error_no_hp.textContent = "";
                errorEmail.textContent = "";

                if (!teleponValid.test(telepon)) {
                    error_no_hp.textContent = "Nomor telepon harus terdiri dari 10 hingga 12 digit.";
                    e.preventDefault(); // Menghentikan pengiriman form
                }

                if (!emailValid.test(email)) {
                    errorEmail.textContent = "Alamat email tidak valid.";
                    e.preventDefault(); // Menghentikan pengiriman form
                }
            });
        </script>

        <script>

        document.addEventListener('DOMContentLoaded', function () {
                var showPasswordCheckbox = document.getElementById('showPassword');
                var passwordInput = document.getElementById('password');

                // Menangani perubahan status checkbox
                showPasswordCheckbox.addEventListener('change', function () {
                    if (showPasswordCheckbox.checked) {
                        passwordInput.setAttribute('type', 'text');
                    } else {
                        passwordInput.setAttribute('type', 'password');
                    }
                });
            });
        </script>
        <script>

            const inputFields = document.querySelectorAll('.form-control');
            const profileImage = document.getElementById('profileImage');
            const submitButton = document.getElementById('submitButton');

            // Simpan nilai awal input dalam array
            const previousValues = Array.from(inputFields, inputField => inputField.value);
            const originalImageSrc = profileImage.src;

            // Tambahkan event listener untuk mendengarkan perubahan pada inputan
            inputFields.forEach((inputField, index) => {
                inputField.addEventListener('input', checkSubmitButtonStatus);
            });

            // Tambahkan event listener untuk mendengarkan perubahan pada gambar
            profileImage.addEventListener('change', checkSubmitButtonStatus);

            function checkSubmitButtonStatus() {
                let inputChanged = false;
                let imageChanged = false;

                inputFields.forEach((inputField, index) => {
                    if (inputField.value.trim() !== '' && inputField.value !== previousValues[index]) {
                        inputChanged = true;
                    }
                });

                if (profileImage.src !== originalImageSrc) {
                    imageChanged = true;
                }

                if (inputChanged || imageChanged) {
                    // Aktifkan tombol jika ada perubahan pada input atau gambar
                    submitButton.removeAttribute('disabled');
                } else {
                    // Nonaktifkan tombol jika tidak ada perubahan
                    submitButton.setAttribute('disabled', 'true');
                }
            }
            // Tambahkan event listener untuk menghandle klik pada tombol
            submitButton.addEventListener('click', function() {
                alert('Tombol diklik!');
            });
        </script>
</body>

</html>
