@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Ubah Pengeluaran</h5>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="/pengeluaran/{{$pengeluaran->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal" class="form-control" value="{{$pengeluaran->tanggal}}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Departemen</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="departemen_id" value="{{$pengeluaran->nama_departemen}}"
                            required>
                            @foreach($listdepartemen as $departemen)
                            <option value="{{ $departemen->id }}" @selected($pengeluaran->departemen_id ==
                                $departemen->id)>{{ $departemen->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="kategori_id" value="{{$pengeluaran->nama_k_pengeluaran}}"
                            required>
                            @foreach($listkategori as $kategori)
                            <option value="{{ $kategori->id }}" @selected($pengeluaran->kategori_id == $kategori->id)>{{
                                $kategori->nama_k_pengeluaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-4">
                        <input type="decimal" name="jumlah" class="form-control" value="{{$pengeluaran->jumlah}}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="deskripsi" value="{{$pengeluaran->deskripsi}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gambar" class="col-sm-2 col-form-label" value="{{$pengeluaran->gambar}}">Gambar</label>
                    <div class="col-sm-4">
                        <input type="file" name="gambar" class="form-control" accept="image/*"
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        @if ($pengeluaran->gambar)
                        <img src="{{ asset('uploaded_image/' . $pengeluaran->gambar) }}" id="output"
                            class="mt-3 rounded w-100">
                        @endif
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Perbarui">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection