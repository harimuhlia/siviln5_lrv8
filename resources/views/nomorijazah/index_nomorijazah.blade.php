{{-- @extends('tampilan.apputama')
@section('title', 'Data Ijazah Lengkap')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Siswa</h3>
              <div class="card-tools">
                <a href="" class="btn btn-success btn-sm"><i class="fas fa-upload" title="Tambah Data"></i> Import</a>
                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Lengkap</th>
                  <th>NISN</th>
                  <th>Jurusan(s)</th>
                  <th>TTL</th>
                  <th>Nama Wali</th>
                  <th>No. Ijazah</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ijazah as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namalengkap }}</td>
                    <td>{{ $item->NISN }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->tempatlahir }}, {{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->wali }}</td>
                    <td>{{ $item->no_ijazah }}</td>
                    <td>
                      <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                      <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Lengkap</th>
                    <th>NISN</th>
                    <th>Jurusan(s)</th>
                    <th>TTL</th>
                    <th>Nama Wali</th>
                    <th>No. Ijazah</th>
                    <th>Edit</th>
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
@endsection

@section('javascript')
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
@endsection --}}

@extends('tampilan.apputama')
@section('title', 'Data Siswa')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Lengkap</th>
                  <th>JK</th>
                  <th>NISN</th>
                  <th>Jurusan</th>
                  <th>Lulus</th>
                  <th>No. Ijazah</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ijazah as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namalengkap }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->NISN }}</td>
                    <td>{{ $item->jrsn->nama_jurusan }}</td>
                    <td>{{ Carbon\Carbon::parse($item->thn_lulus)->format('d-m-Y') }}</td>
                    <td>{{ $item->no_ijazah }}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Nama Lengkap</th>
                  <th>JK</th>
                  <th>NISN</th>
                  <th>Jurusan</th>
                  <th>Lulus</th>
                  <th>No. Ijazah</th>
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
@endsection

@section('javascript')
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
@endsection


