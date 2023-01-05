@extends('layouts.jamaah')

@section('content')
@include('components.navbar')
<div class="container">
    <div class="mt-4 page-heading">
        <h5>Laporan Tahunan</h5>
    </div>
    {{-- <a href="/jamaah/laporan/export_excel?departemen={{request('departemen')}}&tahun={{request('tahun')}}&bulan={{request('bulan')}}"
        class="btn btn-success mb-3">Export Excel</a> --}}
    <div class="page-content d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/jamaah/laporan/export_pdf?departemen={{request('departemen')}}&tahun={{request('tahun')}}&bulan={{request('bulan')}}"
        class="btn btn-primary btn-sm mb-3" target="_blank">Unduh PDF</a><br></div>
    <div class="card">
        <div class="card-body">
            <h6 class="text-center">Laporan Keuangan Tahunan</h6>
            <p class="text-center">Takmir Masjid Baitul Amin Tahun {{ request('tahun') ?? now()->year }}</p>
            <div class="card-body">
                <form class="row">
                    <div class="col-3">
                        <div class="mb-3 row">
                            <label for="departemen" class="col col-form-label">Departemen</label>
                            <div class="col">
                                <select id="departemen" class="form-select" name="departemen"
                                    onchange="this.form.submit()">
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
                            <label for="tahun" class="col col-form-label">Tahun</label>
                            <div class="col">
                                <select id="tahun" class="form-select" name="tahun" onchange="this.form.submit()">
                                    <option value="" selected disabled>Pilih tahun</option>
                                    @foreach ($listtahun as $tahun)
                                    <option value="{{ $tahun }}" @selected((request('tahun') ?? now()->year) ==
                                        $tahun)>{{ $tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                <label class="col col-form-label">Saldo sebelumnya: {{ format_currency($saldotahunsebelumnya)}}</label>
                <table class="table table-bordered">
                    <tr>
                        <th>Nomor</th>
                        <th>Bulan</th>
                        <th class="text-end">Pemasukan</th>
                        <th class="text-end">Pengeluaran</th>
                        <th class="text-end">Saldo</th>
                    </tr>
                    @foreach($laporan as $l)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$listbulan[$l['bulan'] - 1]}}</td>
                        <td class="text-end">{{ format_currency($l['pemasukan'])}}</td>
                        <td class="text-end">{{ format_currency($l['pengeluaran'])}}</td>
                        <td class="text-end">{{ format_currency($l['saldo'])}}</td>
                    </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td colspan="2">Total</td>
                        <td class="text-end">{{ format_currency($totalpemasukan) }}</td>
                        <td class="text-end">{{ format_currency($totalpengeluaran) }}</td>
                        <td class="text-end">{{ format_currency($totalsaldo) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection