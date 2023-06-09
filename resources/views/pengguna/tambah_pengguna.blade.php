@extends('tampilan.apputama')
@section('title', 'Tambah Data Pengguna')
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Untuk Tambah Pengguna</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <form action="/manageuser/store" method="POST">
                @csrf
              <div class="form-group">
                <label for="name">Nama Pembina</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Lengkap" autofocus>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email" autofocus>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Jabatan</label>
                <input id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" required autocomplete="jabatan" placeholder="Nama Jabatan" autofocus>
                @error('jabatan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
                </select>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="role">Role User</label>
                <select class="form-control" id="role" name="role">
                  <option>Administrator</option>
                  <option>Pendidik</option>
                  <option>Tendik</option>
                </select>
              </div>
              </div>
            <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Submit</button>
                <a href="/manageuser" class="btn btn-success btn-sm"><i class="fas fa-undo" title="Kembali"></i> Kembali</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
        <!-- /.card -->
@endsection