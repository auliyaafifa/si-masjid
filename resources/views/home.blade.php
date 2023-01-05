@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
  <h5>Dashboard</h5>
<div class="page-content">
  <div class="container-sm" style="max-width: 960px;">
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header text-center text-success">Total Pemasukan</div>
          <div class="card-body text-center text-success">
            <h5 a class="text-success">{{ format_currency($pemasukanTotal) }}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header text-center text-danger">Total Pengeluaran</div>
          <div class="card-body text-center text-danger">
            <h5 a class="text-danger">{{ format_currency($pengeluaranTotal) }}</h5>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-success mb-3" style="max-width: 18rem;">
          <div class="card-header text-center text-primary">Total Saldo</div>
          <div class="card-body text-center text-primary">
            <h5 a class="text-primary">{{ format_currency($saldoTotal) }}</h5>
          </div>
        </div>
      </div>
    </div>

    <form class="mb-3">
      <label class="col-sm-2 col-form-label" class="form-label">Pilih Tahun</label>
      <div class="col-sm-2">
        <select id="tahun" class="form-select" name="tahun" onchange="this.form.submit()">
          @foreach ($listTahun as $tahun)
          <option value="{{ $tahun }}" @selected((request('tahun') ?? now()->year) ==
            $tahun)>{{ $tahun }}</option>
          @endforeach
        </select>
      </div>
    </form>

    <div class="card">
      <div class="card-body">
        <h6 class="text-center">Perbandingan jumlah pemasukan dalam satu tahun</h6><br>
        <div id="pemasukan"></div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h6 class="text-center">Perbandingan jumlah pengeluaran dalam satu tahun</h6><br>
        <div id="pengeluaran"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h6 class="text-left">Pemasukan per Departemen</h6>
            <div id="pemasukanperdepartemen">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h6 class="text-left">Pengeluaran per Departemen</h6>
            <div id="pengeluaranperdepartemen"></div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h6 class="text-left">Pemasukan per Kategori</h6>
            <div id="pemasukanperkategori"></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h6 class="text-left">Pengeluaran per Kategori</h6>
            <div id="pengeluaranperkategori"></div>
          </div>
        </div>
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