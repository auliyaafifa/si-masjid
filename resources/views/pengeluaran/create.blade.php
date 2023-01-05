@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Tambah Pengeluaran</h5>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="/pengeluaran/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal" required class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Departemen</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="departemen_id" required>
                            @foreach($listdepartemen as $departemen)
                            <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="kategori_id" required>
                            @foreach($listkategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_k_pengeluaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-4">
                        <input type="number" name="jumlah" required class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-4">
                        <input type="file" name="gambar" class="form-control" accept="image/*"
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                        <img id="output" class="mt-3 rounded w-100">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection