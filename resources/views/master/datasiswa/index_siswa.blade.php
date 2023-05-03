@extends('tampilan.apputama')
@section('title', 'Data Ijazah Lengkap')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Seluruh Data Siswa</h3>
              <div class="card-tools">
<!-- Button trigger modal -->
@if (Auth()->user()->role == 'Administrator')
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah"><i class="fas fa-upload"></i> Import</button>
@endif
<!-- Modal -->
<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{-- @if($errors->any())
        Gagal nih
      @endif --}}
  <form action="{{ route('importexcel') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-body">
        <div class="form-gorup">
          <input type="file" name="file">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
                <a href="https://drive.google.com/uc?export=download&id=1E9EmH12Pe_I_Dh4xq2GdjXlMw5Fly6Kr" class="btn btn-info btn-sm"><i class="fas fa-download" title="Download Sample"></i> Download Sample</a>
                <a href="{{ route('datasiswa.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus" title="Tambah Data"></i> Tambah</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!!</strong> There is Duplicate Column : NISN
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Lengkap</th>
                  <th>JK</th>
                  <th>NISN</th>
                  <th>Jurusan</th>
                  <th>TTL</th>
                  <th>No. Ijazah</th>
                  <th>Edit</th>
                </tr>
                </thead>
                <tbody> 
                  @foreach ($datasiswa as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namalengkap }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->NISN }}</td>
                    {{-- <td>{{ $item->nama_jurusan }}</td> --}}
                    <td>{{ $item->jrsn->nama_jurusan }}</td>
                    <td>{{ $item->tempatlahir }}, {{ Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}, </td>
                    <td>{{ $item->no_ijazah }}</td>
                    <td>
                      {{-- <a href="#" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('datasiswa.edit',$item->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a> --}}
                      <form action="{{ route('datasiswa.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="#" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('datasiswa.edit',$item->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                        @if (Auth()->user()->role == 'Administrator')
                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete the record {{ $item->namalengkap }} ?')"><i class="fas fa-trash-alt"></i></button>
                        @endif
                      </form>
                    </td>
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
                    <th>TTL</th>
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
  @include('sweetalert::alert')
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