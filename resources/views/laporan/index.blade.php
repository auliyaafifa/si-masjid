@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h3>Laporan</h3>
</div>
<div class="page-content">
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
                                    <option value="{{ $departemen->id }}" @selected(request('departemen') == $departemen->id)>{{ $departemen->nama_departemen }}</option>
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
                                    <option value="{{ $tahun }}" @selected((request('tahun') ?? now()->year) == $tahun)>{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            Saldo sebelumnya: {{ format_currency($saldotahunsebelumnya) }}
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
                    <td class="text-end">{{$l['pemasukan']}}</td>
                    <td class="text-end">{{$l['pengeluaran']}}</td>
                    <td class="text-end">{{$l['saldo']}}</td>
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
@endsection