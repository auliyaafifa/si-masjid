@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Tambah Pemasukan</h5>
</div>
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="/pemasukan/store" method="POST">
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
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_k_pemasukan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama Donatur</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_donatur" class="form-control">
                    </div>
                </div> --}}
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Jumlah</label>
                    <div class="col-sm-4">
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan"> <a
                    href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection