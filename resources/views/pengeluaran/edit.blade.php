@extends('layouts.dashboard')

@section('content')
<h1>Ubah Pengeluaran</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/pengeluaran/{{$pengeluaran->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{$pengeluaran->tanggal}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id" value="{{$pengeluaran->nama_k_pengeluaran}}">
                    @foreach($listkategori as $kategori)
                        <option value="{{ $kategori->id }}" @selected($pengeluaran->kategori_id == $kategori->id)>{{ $kategori->nama_k_pengeluaran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                    <input type="decimal" name="jumlah" class="form-control" value="{{$pengeluaran->jumlah}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="deskripsi" rows="10">{{$pengeluaran->deskripsi}}</textarea><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select class="form-select" name="departemen_id" value="{{$pengeluaran->nama_departemen}}">
                    @foreach($listdepartemen as $departemen)
                        <option value="{{ $departemen->id }}" @selected($pengeluaran->departemen_id == $departemen->id)>{{ $departemen->nama_departemen }}</option>
                    @endforeach
                </select><br>
            <div class="mb-3">
                <label for="gambar" class="form-label" value="{{$pengeluaran->gambar}}">Gambar</label>
                    <input type="file" name="gambar" class="form-control"
                        accept="image/*" onchage="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                <div class="mt-3"><img src="" id="output" widt="500">
            </div><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui"><br>
        </form>
    </div>
@endsection
