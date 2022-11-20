@extends('layouts.jamaah')

@section('content')
@include('components.navbar')
<img src="{{ asset('img/banner.jpg') }}" class="img-fluid w-100" alt="...">
<div class="container">

  <div class="card mt-4">
    <div class="card-body">
      <h1>Masjid Baitul Amin</h1>
      <p>
        Masjid Baitul Amin merupakan salah satu masjid besar di Desa Balonggebang, Kecamatan Gondang, Kabupaten Nganjuk. Masjid ini telah dibangun sejak tahun sebelum kemerdekaan Indonesia yaitu pada tahun 1938.
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
          <h3>{{ $pemasukanTotal }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h5>Total Pengeluaran</h5>
          <h3>{{ $pengeluaranTotal }}</h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <h5>Total Saldo</h5>
          <h3>{{ $saldoTotal }}</h3>
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
          text: 'Pemasukan di tahun, ' + @json($year),
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
          text: 'Pengeluaran di tahun, ' + @json($year),
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
</script>
@endsection