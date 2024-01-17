<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Antrian</title>

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

    @include('admin.template.nav_admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Antrian</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            @if (session()->has('update_pesan'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('update_pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('delete_pesan'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('delete_pesan') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
          <h3 class="card-title">Reservasi Gedung</h3>
          <div class="card-tools">
              <div class="col-12">
                  <a type="button" class="btn btn-success" href="/">
                  <i class="bi bi-plus-square"></i> + Tambah Reservasi
                  </a>
                </div>
            </div>
        </div>
        @if(count($booking))
        <div class="card-body p-3">
          <table class="table table-striped projects" id=dataTable>
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Cust
                        </th>
                        <th>
                            Gedung
                        </th>
                        <th>
                            Acara
                        </th>
                        <th>
                            Waktu Pemesanan
                        </th>
                        <th>
                            Biaya
                        </th>
                        <th>
                            Bukti
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1;
                @endphp
                    @foreach($booking as $item)
                    <tr>
                        <td>
                            {{ $counter++ }}
                        </td>
                        <td>
                            {{ $item->user['nama'] }}
                        </td>
                        <td>
                            {{ $item->paket['kategori'] }}
                        </td>
                        <td>
                            {{ $item->paket['nama_acara'] }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            Rp {{ $item->total_harga }}
                        </td>
                        <td>
                            @if ($item->bukti_pembayaran)
                                <p>
                                    <a href="#" class="link-offset-2 link-underline link-underline-opacity-0" data-bs-toggle="modal" data-bs-target="#lihat-gambar-{{ $item->id }}">
                                        Bukti
                                    </a>
                                </p>

                                <!-- Modal -->
                                <div class="modal fade" id="lihat-gambar-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="background-color: transparent; border:0;">
                                            <div class="modal-header" style="border-bottom:0;">
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>

                                            </div>
                                            <div class="modal-body p-0 d-flex justify-content-center">
                                                <img src="{{ asset('assets/img/upload/'.$item->bukti_pembayaran)}}" alt="{{ $item->bukti_pembayaran }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="waktu-pemesanan" data-waktu-pemesanan="{{ $item->created_at }}" data-waktu-expired="{{ $item->waktu_expired }}">
                                {{ $item->waktu_expired ? now()->diffInHours($item->waktu_expired).' jam' : 'Belum ada durasi'}}
                            </div>
                            @endif
                        </td>
                        <td class="project-state">
                            {{-- <span class="badge badge-danger">{{ $item->status }}</span> --}}
                            @if ($item->status == 'Belum terverifikasi')
                                <p class="mb-0 col-5"><span class="badge text-bg-danger fs-7">{{ $item->status }}</span></p>
                            @endif
                            @if ($item->status == 'Menunggu Konfirmasi')
                                <p class="mb-0 col-5"><span class="badge text-bg-warning fs-7">{{ $item->status }}</span></p>
                            @endif
                            @if ($item->status == 'Bayar DP')
                                <p class="mb-0 col-5"><span class="badge text-bg-info fs-7">{{ $item->status }}</span></p>
                            @endif
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-success btn-sm" href="/antrianedit/ {{ $item->id  }} "onclick="return confirm('Apakah benar Reservasi bayar Lunas?')">
                                <i class="fas fa-check">
                                </i>
                            </a>
                            <a class="btn btn-primary btn-sm" href="/antriandp/ {{ $item->id  }}" onclick="return confirm('Apakah benar Reservasi bayar DP?')">
                                <i class="fas fa-money-bill">
                                </i>
                            </a>
                            <a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#detail-{{ $item->id }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            @method('delete')
                            @csrf
                            <a class="btn btn-danger btn-sm" href="/antrianbatal/ {{ $item->id  }}" onclick="return confirm('Apakah Anda yakin mengahapus Reservasi ini?')">
                                <i class="fas fa-trash"></i>
                            </a>

                            {{-- modal invoice --}}
                            <div class="modal fade" id="detail-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $item->paket['nama_acara'] }} - Detail Pesanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <thead class="table-primary">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Waktu Pemesanan</th>
                                                        <th>Customer</th>
                                                        <th>Jenis Gedung</th>
                                                        <th>Acara</th>
                                                        <th>Tanggal Sewa</th>
                                                        <th>Lama Sewa</th>
                                                        <th>Kursi</th>
                                                        <th>Mic</th>
                                                        <th>Proyektor</th>
                                                        <th>Kebersihan</th>
                                                        <th>Ruang Transit</th>
                                                        <th>Kuade Luar</th>
                                                        <th>Gladi Bersih</th>
                                                        <th>Total Biaya</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->user['nama'] }}</td>
                                                        <td>{{ $item->paket['kategori'] }}</td>
                                                        <td>{{ $item->paket['nama_acara'] }}</td>
                                                        <td>{{ $item->tanggal_sewa }}</td>
                                                        <td>{{ $item->lama_sewa }}</td>
                                                        <td>{{ $item->tambah_kursi }}</td>
                                                        <td>{{ $item->tambah_mic }}</td>
                                                        <td>{{ $item->tambah_proyektor }}</td>
                                                        <td>{{ $item->kebersihan }}</td>
                                                        <td>{{ $item->ruang_transit }}</td>
                                                        <td>{{ $item->kuade_luar }}</td>
                                                        <td>{{ $item->gladi_bersih }}</td>
                                                        <td>Rp {{ $item->total_harga }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
        </div>
        @else
            <p class="text-center"> Belum Ada Pesanan</p>
        @endif
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
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    // Ambil semua elemen dengan kelas 'waktu-pemesanan'
    const waktuPemesananElems = document.querySelectorAll('.waktu-pemesanan');

    // Perbarui tampilan waktu setiap detik
    setInterval(() => {
        waktuPemesananElems.forEach((elem) => {
            const waktuPemesanan = new Date(elem.getAttribute('data-waktu-pemesanan')).getTime();
            const waktuExpired = new Date(elem.getAttribute('data-waktu-expired')).getTime();
            const sisaWaktu = waktuExpired - Date.now();

            if (sisaWaktu > 0) {
                // Hitung jam, menit, dan detik
                const jam = Math.floor(sisaWaktu / (1000 * 60 * 60));
                const menit = Math.floor((sisaWaktu % (1000 * 60 * 60)) / (1000 * 60));
                const detik = Math.floor((sisaWaktu % (1000 * 60)) / 1000);

                // Update tampilan elemen
                elem.innerHTML = jam + ':' + menit + ':' + detik;
            } else {
                elem.innerHTML = 'Kadaluarsa';
            }
        });
    }, 1000);  // Perbarui setiap 1000 milidetik (1 detik)
</script>



</body>
