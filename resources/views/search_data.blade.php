<!DOCTYPE html>
<html>
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>E-Ijazah N5 (SIVIL) Nelkata</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/soon.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

  </head>
  <!-- START BODY -->
  <body class="nomobile">

    <!-- START HEADER -->
    <section id="header">
        <div class="container">
          <div class="col-md-7">
            <header>
                <!-- HEADLINE -->
                <h1 data-animated="GoIn"><b>SIVIL</b> NELKATA</h1>
                <h4 data-animated="GoIn">Sistem Verifikasi Ijazah Elektronik SMK Negeri 5 Kabupaten Tangerang</h4>
            </header>
              <p>Untuk memastikan keabsahan ijazah anda, pastikan nomor ijazah anda dapat diverifikasi melalui SIVIL. Pastikan anda mengisi Nama Jurusan, Nomor NISN dan Nomor Ijazah dengan benar. Apabila nomor ijazah anda tidak terdaftar, silakan hubungi Kesiswaan untuk memastikan data anda telah diinput dengan benar. Pendataan SIVIL Ijazah ini resmi diterbitkan dari T.P 2022-2023, bagi lulusan dibawah tahun tersebut apabila tidak ditemukan di SIVIL silakan hubungi Kesiswaan atau datang langsung ke Sekolah.</p>

              
              <a href="/" class="btn btn-warning btn-sm"><i class="fas fa-sync-alt"></i> Refresh Ulang Halaman Verifikasi</a>
      </div>
      <div class="col-md-5">
            	<h4>FORMULIR VERIFIKASI IJAZAH</h4>           
          <div class="card">
              <div class="card-body">
                  <form action="/searchdata" method="get">
                      @csrf
                      <input type="hidden" name="search" value="search">
                      <div class="form-group">
                        <label>Nama Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option value="">-- Pilih Jurusan --</option>
                          @foreach ($jurusan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                          @endforeach
                        </select>
                        </div>
                      <div class="form-group">
                          <label for="">NISN</label>
                          <input type="number" name="NISN" id="" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="">Nomor Ijazah</label>
                          <input type="text" name="no_ijazah" required id="" class="form-control">
                      </div>
                      <div class="form-group">
                          <button class="btn btn-primary"><i class="far fa-mouse"></i> Verifikasi Data</button>
                      </div>
                  </form>
              </div>
          </div>
  
          @isset($searchsiswa)
          @if (empty($searchsiswa))
              <h1>Data yang anda masukan tidak valid</h1>
          @else
          <div class="card">
              <div class="card-header">
                  Data Siswa
              </div>
              <div class="card-body">
                {{-- @forelse ($searchsiswa as $item)
                <p><strong>Sekolah     : {{ $item->asalsekolah }}</strong></p>
                <p><strong>Nama       : {{ $item->namalengkap }}</strong></p>
                <p><strong>NISN       : {{ $item->NISN }}</strong></p>
                <p><strong>Jurusan    : {{ $item->jrsn->nama_jurusan }}</strong></p>
                <p><strong>No. Ijazah : {{ $item->no_ijazah }}</strong></p>
                <p><strong>Tahun Lulus: {{ Carbon\Carbon::parse($item->tahun_lulus)->format('d-m-Y') }}</strong></p>
                @empty
                <tr>
                   <strong>Nama Yang Anda Cari Tidak Ditemukan, Silakan Masukan Data Yang Benar</strong>
                </tr>
                @endforelse --}}
<!-- ========================================================== -->
                @forelse ($searchsiswa as $item)
                <div class="form-group">
                  <input type="text" name="asalsekola" required id="" class="form-control" placeholder="Sekolah: {{ $item->asalsekolah }}" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="namalengkap" required id="" class="form-control" placeholder="Nama: {{ $item->namalengkap }}" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="nisn" required id="" class="form-control" placeholder="Nomor Induk SN: {{ $item->NISN }}" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="jurusan" required id="" class="form-control" placeholder="Konsentrasi Keahlian: {{ $item->jrsn->nama_jurusan }}" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="ijazah" required id="" class="form-control" placeholder=" No Ijazah: {{ $item->no_ijazah }}" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="thnlulus" required id="" class="form-control" placeholder="Tahun Lulus: {{ Carbon\Carbon::parse($item->thn_lulus)->format('d-m-Y') }}" readonly>
                </div>
                @empty
                <tr>
                   <strong>Nama Yang Anda Cari Tidak Ditemukan, Silakan Masukan Data Yang Benar</strong>
                </tr>
                @endforelse
<!-- ================================================================== -->
                  {{-- <table class="table">
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Jurusan</th>
                            <th>TTL</th>
                            <th>Nama Wali</th>
                            <th>No. Ijazah</th>
                            <th>Asal Sekolah</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($searchsiswa as $item)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->namalengkap }}</td>
                                <td>{{ $item->NISN }}</td>
                                <td>{{ $item->jrsn->nama_jurusan }}</td>
                                <td>{{ $item->tempatlahir }}, {{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->wali }}</td>
                                <td>{{ $item->no_ijazah }}</td>
                                <td>{{ $item->asalsekolah }}</td>
                              </tr>
                          @empty
                              <tr>
                                 <strong>Nama Yang Anda Cari Tidak Ditemukan, Silakan Masukan Data Yang Benar</strong>
                              </tr>
                          @endforelse
                      </tbody>
                  </table> --}}
              </div>
          </div>
          @endif 
        @endisset
      </div>
			</div>  
        </div>
        <!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXTE READABLE -->
        <div id="layer"></div>
        <!-- END LAYER -->
        <!-- START SLIDER -->
        <div id="slider" class="rev_slider">
            {{-- <ul>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/1.jpg">
                <img src="assets/img/slider/1.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/2.jpg">
                <img src="assets/img/slider/2.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/3.jpg">
                <img src="assets/img/slider/3.jpg">
              </li>
              <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/4.jpg">
                <img src="assets/img/slider/4.jpg">
              </li>
            </ul> --}}
        </div>
        <!-- END SLIDER -->
    </section>
    <!-- END HEADER -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
	  <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/soon/plugins.js"></script>
    <script src="assets/js/soon/jquery.themepunch.revolution.min.js"></script>
    <script src="assets/js/soon/custom.js"></script>
  </body>
  <!-- END BODY -->
</html>