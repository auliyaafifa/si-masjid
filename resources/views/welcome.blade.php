@extends('layouts.jamaah')

@section('content')
@include('components.navbar')
<div class="container">
  <img src="{{ asset('img/banner.jpg') }}" class="img-fluid w-100" alt="...">
  <div class="container">
    <div class="card mt-4">
      <div class="card-body">
        <h2>Masjid Baitul Amin</h2>
        <p>
          Masjid Baitul Amin merupakan salah satu masjid besar di Desa Balonggebang, Kecamatan Gondang, Kabupaten
          Nganjuk. Masjid ini telah dibangun sejak tahun sebelum kemerdekaan Indonesia yaitu pada tahun 1938.
        </p>
        <p class="mb-0">
          Luas: 449 meter persegi <br>
          Luas Utama: 8x20 meter <br>
          Serambi: 9x20 meter
          Total Jamaah: +- 530 orang
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <h5>Total Pemasukan</h5>
            <h3>{{ format_currency($pemasukanTotal) }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <h5>Total Pengeluaran</h5>
            <h3>{{ format_currency($pengeluaranTotal) }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <h5>Total Saldo</h5>
            <h3>{{ format_currency($saldoTotal) }}</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div id="pemasukan"></div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div id="pengeluaran"></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center">Pemasukan per Departemen</h5>
          <div id="pemasukanperdepartemen"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center">Pengeluaran per Departemen</h5>
          <div id="pengeluaranperdepartemen"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center">Pemasukan per Kategori</h5>
          <div id="pemasukanperkategori"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="text-center">Pengeluaran per Kategori</h5>
          <div id="pengeluaranperkategori"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="card text-center">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card">
          <img src="{{ asset('img/gambar1.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{ asset('img/gambar2.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{ asset('img/gambar3.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
              content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{ asset('img/gambar4.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  // Pemasukan
  var optionsPemasukan = {
          series: [{
          name: 'Pemasukan',
          data: @json($dataYPemasukan)
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: @json($listBulan),
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
          }
        
        },
        title: {
          text: 'Pemasukan pada tahun, ' + @json($year),
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
      };

        var chartPemasukan = new ApexCharts(document.querySelector("#pemasukan"), optionsPemasukan);
        chartPemasukan.render();

        // Pengeluaran
        var optionsPengeluaran = {
          series: [{
          name: 'Pengeluaran',
          data: @json($dataYPengeluaran)
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: @json($listBulan),
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
          }
        
        },
        title: {
          text: 'Pengeluaran pada tahun, ' + @json($year),
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chartPengeluaran = new ApexCharts(document.querySelector("#pengeluaran"), optionsPengeluaran);
        chartPengeluaran.render();

  let dataYPemasukanPerDepartemen = @json($dataYPemasukanPerDepartemen);
        dataYPemasukanPerDepartemen = dataYPemasukanPerDepartemen.map(item => Number(item));
        
  optionsPemasukanDepartemen = {
    series: dataYPemasukanPerDepartemen,
    chart: {
    type: 'pie',
  },
  labels: @json($dataXPemasukanPerDepartemen),
  };

  var chartPemasukanDepartemen = new ApexCharts(document.querySelector("#pemasukanperdepartemen"), optionsPemasukanDepartemen);
  chartPemasukanDepartemen.render();

  let dataYPengeluaranPerDepartemen = @json($dataYPengeluaranPerDepartemen);
        dataYPengeluaranPerDepartemen = dataYPengeluaranPerDepartemen.map(item => Number(item));

  optionsPengeluaranDepartemen = {
    series: dataYPengeluaranPerDepartemen,
    chart: {
    type: 'pie',
  },
  labels: @json($dataXPengeluaranPerDepartemen),
  };

  var chartPengeluaranDepartemen = new ApexCharts(document.querySelector("#pengeluaranperdepartemen"), optionsPengeluaranDepartemen);
  chartPengeluaranDepartemen.render();

  let dataYPemasukanPerKategori = @json($dataYPemasukanPerKategori);
        dataYPemasukanPerKategori = dataYPemasukanPerKategori.map(item => Number(item));
        
  optionsPemasukanKategori = {
    series: dataYPemasukanPerKategori,
    chart: {
    type: 'pie',
  },
  labels: @json($dataXPemasukanPerKategori),
  };

  var chartPemasukanKategori = new ApexCharts(document.querySelector("#pemasukanperkategori"), optionsPemasukanKategori);
  chartPemasukanKategori.render();

  let dataYPengeluaranPerKategori = @json($dataYPengeluaranPerKategori);
        dataYPengeluaranPerKategori = dataYPengeluaranPerKategori.map(item => Number(item));

  optionsPengeluaranKategori = {
    series: dataYPengeluaranPerKategori,
    chart: {
    type: 'pie',
  },
  labels: @json($dataXPengeluaranPerKategori),
  };

  var chartPengeluaranKategori = new ApexCharts(document.querySelector("#pengeluaranperkategori"), optionsPengeluaranKategori);
  chartPengeluaranKategori.render();
</script>
@endsection