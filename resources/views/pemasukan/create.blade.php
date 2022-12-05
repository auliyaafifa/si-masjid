@extends('layouts.dashboard')

@section('content')
<h1>Tambah Pemasukan</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/pemasukan/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori_id">
                    @foreach($listkategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_k_pemasukan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Donatur</label>
                <input type="text" name="nama_donatur" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                <input type="decimal" name="jumlah" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <textarea class="form-control" name="deskripsi" rows="10"></textarea><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Departemen</label>
                <select class="form-select" name="departemen_id">
                    @foreach($listdepartemen as $departemen)
                        <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                    @endforeach
                </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
    </div>
@endsection
