@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Laporan Bulanan</h5>
    <div class="page-content d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/laporan/export_excel?departemen={{request('departemen')}}&tahun={{request('tahun')}}&bulan={{request('bulan')}}"
            class="btn btn-success btn-sm mb-3">Unduh Excel</a>
        <a href="/laporan/bulanan/export_pdf?departemen={{request('departemen')}}&tahun={{request('tahun')}}&bulan={{request('bulan')}}"
            class="btn btn-primary btn-sm mb-3">Unduh PDF</a><br>
    </div>
    <div class="card">
        <div class="card-body">
            <h6 class="text-center">Laporan Keuangan Bulanan</h6>
            <p class="text-center">Takmir Masjid Baitul Amin Tahun {{ request('tahun') ?? now()->year }}</p>
            <div class="card-body">
                <form class="row">
                    <div class="col-3">
                        <div class="mb-3 row">
                            <label for="departemen" class="col col-form-label">Departemen</label>
                            <div class="col">
                                <select id="departemen" class="form-select" name="departemen"
                                    onchange="this.form.submit()">
                                    <option value="" selected>Semua departemen</option>
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
                            <label for="bulan" class="col col-form-label">Bulan</label>
                            <div class="col">
                                <select id="bulan" class="form-select" name="bulan" onchange="this.form.submit()">
                                    <option value="" selected disabled>Pilih bulan</option>
                                    @foreach ($listbulan as $index => $bulan)
                                    <option value="{{ $index + 1 }}" @selected((request('bulan') ?? now()->month) ==
                                        $index + 1)>{{ $bulan }}
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
                Saldo sebelumnya: {{ format_currency($saldobulansebelumnya)}}
                <div class="table-responsive">
                    <table class="mt-2 table table-bordered">
                        <tr class="text-center">
                            <th colspan="5">Pemasukan</th>
                            <th colspan="5">Pengeluaran</th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>Departemen</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Departemen</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                        </tr>
                        @php
                        $count = max(count($pemasukan), count($pengeluaran));
                        @endphp
                        @if ($count === 0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data</td>
                        </tr>
                        @endif
                        @for ($i = 0; $i < $count; $i++) <tr>
                            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->tanggal : ''}}</td>
                            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->departemen->nama_departemen : ''}}</td>
                            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->kategori_pemasukan->nama_k_pemasukan : ''}}
                            </td>
                            <td>{{isset($pemasukan[$i]) ? $pemasukan[$i]->deskripsi : ''}}</td>
                            <td>{{isset($pemasukan[$i]) ? format_currency($pemasukan[$i]->jumlah) : ''}}</td>
                            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->tanggal : ''}}</td>
                            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->departemen->nama_departemen : ''}}</td>
                            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->kategori_pengeluaran->nama_k_pengeluaran :
                                ''}}
                            </td>
                            <td>{{isset($pengeluaran[$i]) ? $pengeluaran[$i]->deskripsi : ''}}</td>
                            <td>{{isset($pengeluaran[$i]) ? format_currency($pengeluaran[$i]->jumlah) : ''}}</td>
                            </tr>
                            @endfor
                            <tr>
                                <td colspan="4">Jumlah</td>
                                <td>{{ format_currency($jumlahpemasukan) }}</td>
                                <td colspan="4">Jumlah</td>
                                <td>{{ format_currency($jumlahpengeluaran) }}</td>
                            </tr>
                    </table>
                </div>
                Saldo akhir: {{ format_currency($saldoakhir)}}
            </div>
        </div>
    </div>
</div>
@endsection