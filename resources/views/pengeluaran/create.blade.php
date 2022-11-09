@extends('layouts.master')

@section('content')
<h1>Tambah Pengeluaran</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/pengeluaran/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id">
                    @foreach($listkategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_k_pengeluaran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                <input type="decimal" name="jumlah" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <textarea class="form-control" name="deskripsi" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select class="form-select" name="departemen_id">
                    @foreach($listdepartemen as $departemen)
                        <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                    @endforeach
                </select><br>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control"
                accept="image/*" onchage="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mt-3"><img src="" id="output" widt="500"></div><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
    </div>
@endsection
