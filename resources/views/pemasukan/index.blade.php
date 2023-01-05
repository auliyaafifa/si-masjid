@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Daftar Pemasukan</h5>
</div>
<div class="page-content">
    @if (in_array(auth()->user()->role, ['Bendahara']))
    <a class="btn btn-success mb-3" href="/pemasukan/create">Tambah</a>
    @endif
    <div class="card">
        <div class="card-body">
            <form id="formFilter" class="row">
                <div class="col-3 mb-3">
                    <select id="departemen" class="form-select" name="departemen">
                        <option value="" selected>Pilih departemen</option>
                        @foreach ($listdepartemen as $departemen)
                        <option value="{{ $departemen->id }}" @selected(request('departemen')==$departemen->
                            id)>{{ $departemen->nama_departemen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 mb-3">
                    <select id="kategori" class="form-select" name="kategori">
                        <option value="" selected>Pilih kategori</option>
                        @foreach ($listkategori as $kategori)
                        <option value="{{ $kategori->id }}" @selected(request('kategori')==$kategori->id)>{{
                            $kategori->nama_k_pemasukan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 mb-3">
                    <input id="tanggal" class="form-control" name="tanggal" placeholder="Pilih tanggal">
                </div>
                <div class="col-3 mb-3">
                    <button class="btn btn-primary">Cari</button>
                </div>
                <div class="col-12 mb-3">
                    <div class="d-flex align-items-center">
                        <label for="perPage">Tampilkan</label>
                        <select name="per_page" class="mx-3 form-select" style="width: auto;"
                            onchange="this.form.submit()">
                            <option value="10" @selected(request('per_page')==10)>10</option>
                            <option value="25" @selected(request('per_page')==25)>25</option>
                            <option value="50" @selected(request('per_page')==50)>50</option>
                            <option value="all" @selected(request('per_page')=='all' )>Semua</option>
                        </select>
                        <span>Data</span>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
                @forelse($pemasukan as $m)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$m->tanggal}}</td>
                    <td>{{$m->kategori_pemasukan->nama_k_pemasukan}}</td>
                    <td>{{format_currency($m->jumlah)}}</td>
                    <td>{{$m->deskripsi}}</td>
                    <td>{{$m->departemen->nama_departemen}}</td>
                    <td style="white-space: nowrap">
                        @if (in_array(auth()->user()->role, ['Bendahara']))
                        <a class="btn btn-warning btn-sm" href="/pemasukan/{{$m->id}}/edit">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#delete{{$m->id}}">Hapus</button>
                        <div class="modal fade" id="delete{{$m->id}}" tabindex="-1"
                            aria-labelledby="delete{{$m->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete{{$m->id}}Label">Apakah Anda yakin?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <form action="/pemasukan/{{$m->id}}" method="POST" class="modal-footer">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                        -
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
    <div class="my-5">
        {{$pemasukan->withQueryString()->links()}}
    </div>
</div>
</div>
</div>
</div>

@endsection

@push('script')

<script>
    const dateRange = @js(request('tanggal') ?? '');
    const dates = dateRange.split(' to ');

    $("[name='tanggal']").flatpickr({
        mode: 'range',
        defaultDate: [
            dates[0] || null,
            dates[1] || null
        ]
    });
</script>
@endpush