@extends('layouts.dashboard')

@section('content')
<h1>Ubah Kategori Pemasukan</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/kategoripemasukan/{{$kategoripemasukan->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                <input type="text" name="nama_k_pemasukan" class="form-control" value="{{$kategoripemasukan->nama_k_pemasukan}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            </div>
            <textarea class="form-control" name="deskripsi" rows="10">{{$kategoripemasukan->deskripsi}}</textarea><br>
            <select class="form-select" name="status" value="{{$kategoripemasukan->status}}">
                <option value=""> Pilih Status</option>
                <option value="Aktif" @if($kategoripemasukan->status == "Aktif") selected @endif>Aktif </option>
                <option value="Tidak Aktif" @if($kategoripemasukan->status == "Tidak Aktif") selected @endif>Tidak Aktif </option>
            </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui">
        </form>
    </div>
@endsection
