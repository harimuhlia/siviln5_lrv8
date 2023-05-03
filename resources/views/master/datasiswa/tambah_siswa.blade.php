@extends('tampilan.apputama')
@section('title', 'Tambah Siswa')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Formulir Tambah Data Siswa</h3>
    </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form action="{{ route('datasiswa.store')}}" enctype="multipart/form-data" method="POST">
    @csrf
  <form>
    <div class="card-body">
      <div class="form-group">
        <label for="namalengkap">Nama Lengkap</label>
        <input type="text" class="form-control" name="namalengkap" placeholder="Masukan Nama Lengkap">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
              <option value="">-- Pilih --</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        <div class="form-group">
        <label for="NISN">NISN</label>
        <input type="text" class="form-control" name="NISN" placeholder="Silakan Masukan NISN">
        </div>
        <div class="form-group">
          <label>Nama Jurusan</label>
          <select class="form-control" name="jurusan">
              <option value="">-- Pilih Jurusan --</option>
            @foreach ($jurusan as $item)
              {{-- <option value="{{ $item->nama_jurusan }}">{{ $item->nama_jurusan }}</option> --}}
              <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
            @endforeach
          </select>
          </div>
        <div class="form-group">
          <label for="tempatlahir">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempatlahir" placeholder="Masukan Tempat Lahir">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Pilih Tanggal">
            </div>
    <div class="form-group">
    <label for="wali">Nama Wali</label>
    <input type="text" class="form-control" name="wali" placeholder="Masukan Nama Wali">
    </div>
    <div class="form-group">
    <label for="thn_masuk">Tahun Masuk</label>
    <input type="date" class="form-control" name="thn_masuk" placeholder="Masukan Tahun Masuk">
    </div>
    <div class="form-group">
      <label for="thn_lulus">Tahun Lulus</label>
      <input type="date" class="form-control" name="thn_lulus" placeholder="Masukan Tahun Lulus">
      </div>
    <div class="form-group">
      <label for="no_ijazah">Nomor Ijazah</label>
      <input type="text" class="form-control" name="no_ijazah" placeholder="Masukan Nomor Ijazah">
      </div>
      <div class="form-group">
        <label for="asalsekolah">Asal Sekolah</label>
        <input type="text" class="form-control" name="asalsekolah" placeholder="Masukan Asal Sekolah">
        </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-success" href="{{ route('datasiswa.index')}}">Kembali</a>
    </div>
    </form>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
@endsection