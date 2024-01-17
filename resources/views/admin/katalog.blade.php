<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Katalog</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
    @include('admin.template.nav_admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Katalog</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @if (session()->has('tambah_katalog'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_katalog') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('delete_katalog'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete_katalog') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('edit_katalog'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('edit_katalog') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="card-title">Daftar Katalog</h3>
                <div class="card-tools">
                    <div class="col-12">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_gedung">
                            <i class="bi bi-plus-square"></i> + Tambah Katalog
                        </button>
                    </div>
                </div>
            {{-- modal tambah --}}
                <div class="modal fade" id="tambah_gedung" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/tambah_katalog" id="rooms-setting" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Gedung</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Aula</label>
                                        <select name="aula_id" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Aula</option>
                                            @foreach ($aula as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama_aula }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="kategori" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Kategori</option>
                                            <option value="Aula Gedung 1">Aula Gedung 1</option>
                                            <option value="Aula Gedung 2">Aula Gedung 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Paket</label>
                                        <input type="text" min="1" name="nama_paket" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Acara</label>
                                        <select name="nama_acara" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Acara</option>
                                            <option value="Resepsi">Resepsi</option>
                                            <option value="Pernikahan">Pernikahan</option>
                                            <option value="Rapat">Rapat</option>
                                            <option value="Seminar">Seminar</option>
                                            <option value="Penataran">Penataran</option>
                                            <option value="Diklat">Diklat</option>
                                            <option value="750">Wisuda</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Harga</label>
                                        <input type="text" min="1" name="harga" id="site_title_inp" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Kursi</label>
                                        <select name="kursi" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Kursi</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                            <option value="600">600</option>
                                            <option value="750">750</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mic</label>
                                        <select name="mic" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Lama Sewa</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Lama Sewa</label>
                                        <select name="lama_sewa" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Lama Sewa</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Fasilitas</label>
                                        <textarea name="fasilitas" id="" rows="4" class="form-control shadow-none" required></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Gambar</label>
                                        <input type="file" name="gambar" id="site_title_inp" class="form-control shadow-none" accept="image/*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <table class="table table-striped projects" id="dataTable">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Aula
                            </th>
                            <th>
                                Kategori
                            </th>
                            <th>
                                Paket
                            </th>
                            <th>
                                Acara
                            </th>
                            <th>
                                Biaya
                            </th>
                            <th >
                                Kursi
                            </th>
                            <th >
                                Mic
                            </th>
                            <th >
                                lama Sewa
                            </th>
                            <th >
                                Fasilitas
                            </th>
                            <th >
                                Gambar
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katalog as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->aula->nama_aula }}
                            </td>
                            <td>
                                {{ $item->kategori }}
                            </td>
                            <td>
                                {{ $item->nama_paket }}
                            </td>
                            <td>
                                {{ $item->nama_acara }}
                            </td>
                            <td>
                                {{ $item->harga }}
                            </td>
                            <td>
                                {{ $item->kursi }}
                            </td>
                            <td>
                                {{ $item->mic }}
                            </td>
                            <td>
                                {{ $item->lama_sewa }}
                            </td>
                            <td>
                                <div class="facilities-cell">
                                    <div class="short-facilities">
                                        {{ substr($item->fasilitas, 0, 50) }}{{ strlen($item->fasilitas) > 50 ? '...' : '' }}
                                    </div>
                                    <div class="full-facilities" style="display: none;">
                                        {{ $item->fasilitas }}
                                    </div>
                                    <button class="read-more-btn btn btn-link btn-sm">Read More</button>
                                </div>
                            </td>
                            <td>
                                <img src="{{ asset('assets/img/'.$item->gambar) }}" style="width: 130px" >
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="/katalog/{{ $item->id }}/edit">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="/katalog/{{ $item->id }}/delete" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.template.footer_admin')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>

<script>
    // Tambahkan script jQuery atau JavaScript di sini
    $(document).ready(function () {
        $('.read-more-btn').on('click', function () {
            var facilitiesCell = $(this).closest('.facilities-cell');
            facilitiesCell.find('.short-facilities').toggle();
            facilitiesCell.find('.full-facilities').toggle();
        });
    });
</script>
</body>
