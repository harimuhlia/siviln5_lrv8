@extends('tampilan.apputama')
@section('title', 'Edit Profil Pengguna')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-primary card-outline p-2">
              <form method="POST" enctype="multipart/form-data" action="{{ route('user.profile.update', $user->id )}}">
                @method("put")
                @csrf
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-3 col-form-label">Name Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name}}" required autocomplete="name">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email}}" required autocomplete="name">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    {{-- <div class="form-group row">
                      <label for="Role" class="col-sm-3 col-form-label">Role User</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('ekskul') is-invalid @enderror" id="role" name="role" value="{{ Auth::user()->role }}" disabled>
                      </div>
                    </div> --}}
                    <div class="form-group row">
                      <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ $user->jabatan }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat">{{ $user->alamat }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-3 col-form-label">Photo Profil</label>
                      <div class="col-sm-9">
                        <img class="profile-user-img img-fluid img-rounded" style="width: 200px"
                     src="{{ asset('fotoprofil/'. $user->foto_profil) }}"
                     alt="User profile picture">
                     <br>
                     <br>
                        <input type="file" class="form-control" name="foto_profil" >
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit"class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Update Profil</a></button>
                    </div>
                    </form>
                  </form>
            </div><!-- /.card-body -->
          <!-- /.card -->
        </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection