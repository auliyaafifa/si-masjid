@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Ubah Pemasukan</h5>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="/pemasukan/{{$pemasukan->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal" required class="form-control" value="{{$pemasukan->tanggal}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Departemen</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="departemen_id" value="{{$pemasukan->nama_departemen}}"
                            required>
                            @foreach($listdepartemen as $departemen)
                            <option value="{{ $departemen->id }}" @selected($pemasukan->departemen_id ==
                                $departemen->id)>{{ $departemen->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="kategori_id" value="{{$pemasukan->nama_k_pemasukan}}"
                            required>
                            @foreach($listkategori as $kategori)
                            <option value="{{ $kategori->id }}" @selected($pemasukan->kategori_id == $kategori->id)>{{
                                $kategori->nama_k_pemasukan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" class="form-label">Nama Donatur</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_donatur" class="form-control"
                            value="{{$pemasukan->nama_donatur}}">
                    </div>
                </div> --}}
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" class="form-label">Jumlah</label>
                    <div class="col-sm-4">
                        <input type="decimal" name="jumlah" class="form-control" value="{{$pemasukan->jumlah}}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" class="form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="deskripsi" value="{{$pemasukan->deskripsi}}">
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