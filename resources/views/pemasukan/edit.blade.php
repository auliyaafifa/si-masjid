@extends('layouts.master')

@section('content')
<h1>Ubah Pemasukan</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/pemasukan/{{$pemasukan->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{$pemasukan->tanggal}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id" value="{{$pemasukan->nama_k_pemasukan}}">
                    @foreach($listkategori as $kategori)
                        <option value="{{ $kategori->id }}" @selected($pemasukan->kategori_id == $kategori->id)>{{ $kategori->nama_k_pemasukan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                <input type="decimal" name="jumlah" class="form-control" value="{{$pemasukan->jumlah}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <textarea class="form-control" name="deskripsi" rows="10">{{$pemasukan->deskripsi}}</textarea><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select class="form-select" name="departemen_id" value="{{$pemasukan->nama_departemen}}">
                    @foreach($listdepartemen as $departemen)
                        <option value="{{ $departemen->id }}" @selected($pemasukan->departemen_id == $departemen->id)>{{ $departemen->nama_departemen }}</option>
                    @endforeach
                </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui"><br>
        </form>
    </div>
@endsection
