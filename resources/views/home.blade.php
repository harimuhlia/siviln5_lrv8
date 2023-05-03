@extends('tampilan.apputama')
@section('title', 'Home')

@section('content')
<section class="section">
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Data Pengguna</span>
      <span class="info-box-number">
      {{ $pengguna }}
      <small>Users</small>
      </span>
      </div>
      
      </div>
      
      </div>
      
      <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-graduate"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Total Siswa</span>
      <span class="info-box-number">{{ $siswa }} Siswa</span>
      </div>
      
      </div>
      
      </div>
      
      
      <div class="clearfix hidden-md-up"></div>
      <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Jumlah Jurusan</span>
      <span class="info-box-number">{{ $jurusan }} Jurusan</span>
      </div>
      
      </div>
      
      </div>
      
      <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-volume-up"></i></span>
      <div class="info-box-content">
      <span class="info-box-text">Data Lainnya</span>
      <span class="info-box-number">Belum Ada Data</span>
      </div>
      </div>
      </div>
      </div>

      <div class="col-12 col-sm-6 col-md-12">
      <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Data Jenis Kelamin Perjurusan</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        </div>
        
        </div>
        
        </div>
      <div class="row">
        <div class="col-md-6">
        
        <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Peserta Didik Pertahun</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        
        </div>
        
        
        <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Data Lain</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <canvas id="" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        
        </div>
        
        </div>
        
        <div class="col-md-6">
        
        <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Peserta Didik Perjurusan</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        </div>
        
        </div>
        
        
        <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Bar Chart</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="chart">
        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        </div>
        
        </div>
        </div>
        </div>
      <!-- /.row -->
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
                  <th>NISN</th>
                  <th>Jurusan(s)</th>
                  <th>TTL</th>
                  <th>Nama Wali</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ijazah_home as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namalengkap }}</td>
                    <td>{{ $item->NISN }}</td>
                    <td>{{ $item->jrsn->nama_jurusan }}</td>
                    <td>{{ $item->tempatlahir }}, {{ Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $item->wali }}</td>
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
    </div>
    <!-- /.container-fluid -->
  </div>

  {{-- {{ $jurusans }} --}}
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

          //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        @foreach ($dataByYear as $data )
          {{ $data->year }},
        @endforeach
      ],
      datasets: [
        {
          data: [
            @foreach ($dataByYear as $data )
              {{ $data->total }},
            @endforeach
          ],
          backgroundColor : [
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
          ],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
        @foreach ($dataByJurusan as $data )
          "{{ $data->nama_jurusan }}",
        @endforeach
      ],
      datasets: [
        {
          data: [
            @foreach ($dataByJurusan as $data )
              {{ $data->total }},
            @endforeach
          ],
          backgroundColor : [
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
          ],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, stackedBarChartData)

    var stackedBarChartData = {
      labels  : [
        @foreach ($jurusans as $data )
              "{{ $data->jrsn }}",
            @endforeach
      ],
      datasets: [
        {
          label               : 'Perempuan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            @foreach ($dataPerempuan as $data )
              {{ $data->total }},
            @endforeach
          ]
        },
        {
          label               : 'Laki-Laki',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            @foreach ($dataLaki as $data )
              {{ $data->total }},
            @endforeach
          ]
        },
      ]
    }

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
    </script>
@endsection