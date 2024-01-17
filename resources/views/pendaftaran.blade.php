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
    <section class="container-fluid" style="height: 500px;">
        <div class="container mx-auto mt-3 py-1">
            <h4 class="fw-bold mb-4">Informasi Pendaftaran</h4>
            <div class="container p-0">
                <div class="row g-0">
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#ffffff" class="bi bi-person-plus-fill bg-primary rounded-circle p-1" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </div>
                    <div class="col-11">
                        <div class="container">
                            <p class="fw-bold mt-0" style="font-size: 20px;">Pendaftaran</p>
                            <p class="mt-4">Untuk melakukan  pendaftaran akun guna reservasi aula gedung PKPRI, anda dapat menekan tombol
                                <a class="btn btn-secondary nav-item" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#">Daftar</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    @include('template.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
