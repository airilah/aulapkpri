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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>

<body>
    <!-- Navbar  -->
    @include('template.nav')

    <!-- Content -->
    <section class="container-fluid">
        <div class="container mx-auto mt-3 py-1">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengurus PKP-RI</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengurus</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengurus as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nama_pengurus }}</td>
                                                <td>{{ $item->jabatan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota PKP-RI</h6>
                            </div>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Anggota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anggota as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nama_anggota }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable1').DataTable();
        });
        $(document).ready(function () {
            $('#dataTable2').DataTable();
        });
    </script>
</body>

</html>
