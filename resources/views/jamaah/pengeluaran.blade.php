@extends('layouts.jamaah')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="mt-4 page-heading">
        <h3>Pengeluaran</h3>
    </div>
     <div class="card">
        <div class="card-body">
            <form class="row">
                <div class="col-3">
                    <div class="mb-3 row">
                        <label for="departemen" class="col col-form-label">Departemen</label>
                        <div class="col">
                            <select id="departemen" class="form-select" name="departemen" onchange="this.form.submit()">
                                <option value="" selected>Pilih departemen</option>
                                @foreach ($listdepartemen as $departemen)
                                <option value="{{ $departemen->id }}" @selected(request('departemen')==$departemen->
                                    id)>{{ $departemen->nama_departemen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3 row">
                        <label for="kategori" class="col col-form-label">Kategori</label>
                        <div class="col">
                            <select id="kategori" class="form-select" name="kategori" onchange="this.form.submit()">
                                <option value="" selected>Pilih kategori</option>
                                @foreach ($listkategori as $kategori)
                                <option value="{{ $kategori->id }}" @selected(request('kategori')==$kategori->id)>{{
                                    $kategori->nama_k_pengeluaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3 row">
                        <label for="bulan" class="col col-form-label">Bulan</label>
                        <div class="col">
                            <select id="bulan" class="form-select" name="bulan" onchange="this.form.submit()">
                                <option value="" selected>Pilih bulan</option>
                                @foreach ($listbulan as $index => $bulan)
                                <option value="{{ $index + 1 }}" @selected(request('bulan')==$index + 1)>{{ $bulan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3 row">
                        <label for="tahun" class="col col-form-label">Tahun</label>
                        <div class="col">
                            <select id="tahun" class="form-select" name="tahun" onchange="this.form.submit()">
                                <option value="" selected>Pilih tahun</option>
                                @foreach ($listtahun as $tahun)
                                <option value="{{ $tahun }}" @selected(request('tahun')==$tahun)>{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Departemen</th>
                            </tr>
                            @foreach($pengeluaran as $k)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$k->tanggal}}</td>
                                <td>{{$k->kategori_pengeluaran->nama_k_pengeluaran}}</td>
                                <td>{{$k->jumlah}}</td>
                                <td>{{$k->deskripsi}}</td>
                                <td>{{$k->departemen->nama_departemen}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="my-5">
                {{$pengeluaran->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@endsection