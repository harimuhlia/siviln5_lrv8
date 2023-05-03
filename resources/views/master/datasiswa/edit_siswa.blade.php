@extends('tampilan.apputama')
@section('title', 'Edit Data Siswa')

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
<form action="{{ route('datasiswa.update', $datasiswa->id)}}" enctype="multipart/form-data" method="POST">
  @csrf
  @method('put')
<form>
  <div class="card-body">
    <div class="form-group">
      <label for="namalengkap">Nama Lengkap</label>
      <input type="text" class="form-control" name="namalengkap" placeholder="Masukan Nama Lengkap" value="{{ $datasiswa->namalengkap }}">
      </div>
      <div class="form-group">
        <label for="role">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
          <option value="Laki-Laki"{{ $datasiswa->jenis_kelamin == "Laki-Laki" ? 'selected' : "" }}>Laki-Laki</option>
          <option value="Perempuan"{{ $datasiswa->jenis_kelamin == "Perempuan" ? 'selected' : "" }}>Perempuan</option>
        </select>
      </div>
      <div class="form-group">
      <label for="NISN">NISN</label>
      <input type="text" class="form-control" name="NISN" placeholder="Silakan Masukan NISN" value="{{ $datasiswa->NISN }}">
      </div>
      <div class="form-group">
        <label>Nama Jurusan</label>
        <select class="form-control" name="jurusan">
          @foreach ($jurusan as $item)
          {{-- <option value="{{ $item->nama_jurusan }}" {{ $item->id == $datasiswa->jurusan ? "selected" : ""}}>{{ $item->nama_jurusan }}</option> --}}
            <option value="{{ $item->id }}" {{ $item->id == $datasiswa->jurusan ? "selected" : ""}}>{{ $item->nama_jurusan }}</option>
          @endforeach
        </select>
        </div>
      <div class="form-group">
        <label for="tempatlahir">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempatlahir" placeholder="Masukan Tempat Lahir" value="{{ $datasiswa->tempatlahir }}">
        </div>
        <div class="form-group">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tanggal_lahir" placeholder="Pilih Tanggal" value="{{ $datasiswa->tanggal_lahir }}">
          </div>
  <div class="form-group">
  <label for="wali">Nama Wali</label>
  <input type="text" class="form-control" name="wali" placeholder="Masukan Nama Wali" value="{{ $datasiswa->wali }}">
  </div>
  <div class="form-group">
  <label for="thn_masuk">Tahun Masuk</label>
  <input type="date" class="form-control" name="thn_masuk" placeholder="Masukan Tahun Masuk" value="{{ $datasiswa->thn_masuk }}">
  </div>
  <div class="form-group">
    <label for="thn_lulus">Tahun Lulus</label>
    <input type="date" class="form-control" name="thn_lulus" placeholder="Masukan Tahun Lulus" value="{{ $datasiswa->thn_lulus }}">
    </div>
  <div class="form-group">
    <label for="no_ijazah">Nomor Ijazah</label>
    <input type="text" class="form-control" name="no_ijazah" placeholder="Masukan Nomor Ijazah" value="{{ $datasiswa->no_ijazah }}">
    </div>
    <div class="form-group">
      <label for="asalsekolah">Asal Sekolah</label>
      <input type="text" class="form-control" name="asalsekolah" placeholder="Masukan Asal Sekolah" value="{{ $datasiswa->asalsekolah }}">
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