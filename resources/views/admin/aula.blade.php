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
            <h1>Aula</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card">
            <div class="card-header">
                @if (session()->has('tambah_aula'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('tambah_aula') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('delete_aula'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete_aula') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('edit_aula'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('edit_aula') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="card-title">Jenis Aula</h3>
                <div class="card-tools">
                    <div class="col-12">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah_aula">
                            <i class="bi bi-plus-square"></i> + Tambah Aula
                        </button>
                    </div>
                </div>
            {{-- modal tambah --}}
                <div class="modal fade" id="tambah_aula" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/tambah_aula" id="rooms-setting" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Aula</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Aula</label>
                                        <select name="nama_aula" class="form-select form-select-lg mb-0" aria-label=".form-select-sm example" style="font-size: 16px">
                                            <option selected hidden>Pilih Aula</option>
                                            <option value="Aula Gedung 1">Aula Gedung 1</option>
                                            <option value="Aula Gedung 2">Aula Gedung 2</option>
                                            <option value="Aula Gedung 2">Aula Gedung 3</option>
                                            <option value="Aula Gedung 2">Aula Gedung 4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Deskripsi</label>
                                        <input type="text" min="1" name="deskripsi" id="site_title_inp" class="form-control shadow-none">
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
                                Nama Aula
                            </th>
                            <th>
                                Deskripsi
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
                        @foreach ($aula as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->nama_aula }}
                            </td>
                            <td>
                                {{ $item->deskripsi }}
                            </td>
                            <td>
                                <img src="{{ asset('assets/img/'.$item->gambar) }}" style="width: 130px" >
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="/aula/{{ $item->id }}/edit">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="/aula/{{ $item->id }}/delete" onclick="return confirm('Apakah yakin ingin menghapus?')">
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
