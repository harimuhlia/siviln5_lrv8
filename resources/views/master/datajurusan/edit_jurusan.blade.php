@extends('tampilan.apputama')
@section('title', 'Edit Data Jurusan')

@section('content')
<section class="content">
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12">
  <div class="card card-primary">
  <div class="card-header">
  <h3 class="card-title">Formulir Edit Data Jurusan</h3>
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
<form action="{{ route('datajurusan.update', $datajurusan->id)}}" enctype="multipart/form-data" method="POST">
  @csrf
  @method('put')
<form>
  <div class="card-body">
    <div class="form-group">
      <label for="kode_jurusan">Kode Jurusan</label>
      <input type="text" class="form-control" name="kode_jurusan" placeholder="Masukan Kode Jurusan" value="{{ $datajurusan->kode_jurusan }}">
      </div>
      <div class="form-group">
      <label for="nama_jurusan">Nama Jurusan</label>
      <input type="text" class="form-control" name="nama_jurusan" placeholder="Silakan Masukan Nama Jurusan" value="{{ $datajurusan->nama_jurusan }}">
      </div>
  <div class="card-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-success" href="{{ route('datajurusan.index')}}">Kembali</a>
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