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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('admin.template.nav_admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                    <table class="table table-bordered table-striped" id="dataTable">
                        <div>
                            <a class="btn btn-danger btn-sm" style="margin-bottom: 20px;" href="{{ route('cetak_laporan') }}" target="_blank">
                                PDF
                            </a>
                        </div>
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
                        <tfoot>
                            <tr>
                                <td colspan="7" style="text-align:right"><strong>Total Seluruh Pemasukan:</strong></td>
                                <td id="totalPemasukan" colspan="2"><strong></strong></td>
                            </tr>
                        </tfoot>
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
<!-- Page specific script -->
<script>
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
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil semua elemen dalam kolom "Total Biaya"
        var totalPemasukanCells = document.querySelectorAll('#dataTable tbody td:nth-child(8)');

        // Inisialisasi total pemasukan
        var totalPemasukan = 0;

        // Hitung total biaya
        totalBiayaCells.forEach(function (cell) {
            totalPemasukan += parseCurrency(cell.textContent.trim());
        });

        // Tampilkan total pemasukan di footer
        document.getElementById('totalPemasukan').textContent = 'Rp. ' + number_format(totalPemasukan, 0, ',', '.');
    });

    // Fungsi untuk memformat angka menjadi format mata uang
    function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep,
            dec = (typeof decPoint === 'undefined') ? '.' : decPoint,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }

        return s.join(dec);
    }
    // Fungsi untuk parse string mata uang menjadi angka
    function parseCurrency(currencyString) {
        return parseInt(currencyString.replace('Rp. ', '').replace('.', '').trim());
    }
</script>



</body>
</html>
