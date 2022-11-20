@extends('layouts.dashboard')

@section('content')
<h1>Ubah Kategori Pengeluaran</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/kategoripengeluaran/{{$kategoripengeluaran->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_k_pengeluaran" class="form-control" value="{{$kategoripengeluaran->nama_k_pengeluaran}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            </div>
            <textarea class="form-control" name="deskripsi" rows="10">{{$kategoripengeluaran->deskripsi}}</textarea><br>
            <select class="form-select" name="status" value="{{$kategoripengeluaran->status}}">
                <option value=""> Pilih Status</option>
                <option value="Aktif" @if($kategoripengeluaran->status == "Aktif") selected @endif>Aktif </option>
                <option value="Tidak Aktif" @if($kategoripengeluaran->status == "Tidak Aktif") selected @endif>Tidak Aktif </option>
            </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui"><br>
        </form>
    </div>
@endsection
