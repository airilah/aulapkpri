<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Laporan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Pemesanan Gedung</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Waktu Pesanan</th>
                                <th>Aula</th>
                                <th>Acara</th>
                                <th>Tanggal Sewa</th>
                                <th>Fasilitas</th>
                                <th>Tambahan Fasilitas</th>
                                <th>Total Biaya</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>

                        @foreach($riwayat as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->user['nama'] }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->paket['kategori'] }}</td>
                                <td>{{ $item->paket['nama_acara'] }}</td>
                                <td>{{ $item->tanggal_sewa }}</td>
                                <td>
                                    lama Sewa: {{ $item->lama_sewa}}<br>
                                    Kursi: {{ $item->tambah_kursi}}<br>
                                    Mic: {{ $item->tambah_mic}}
                                </td>
                                <td>
                                    Proyektor: {{ $item->tambah_proyektor }}<br>
                                    Kebersihan: {{ $item->kebersihan }}<br>
                                    Ruang Transit: {{ $item->ruang_transit }}<br>
                                    Kuade Luar: {{ $item->kuade_luar }}<br>
                                    Gladi Bersih: {{ $item->gladi_bersih }}
                                </td>
                                <td>{{ 'Rp '. number_format($item->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $item->pembayaran['nama_metode'] }}<br>
                                    <img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="{{ $item->bukti_pembayaran }}" class="img-fluid" width="100px">
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
<!-- DataTables  & Plugins -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>

<script type="text/javascript">
    window.print();
</script>
<!-- Page specific script -->
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
</body>
</html>
