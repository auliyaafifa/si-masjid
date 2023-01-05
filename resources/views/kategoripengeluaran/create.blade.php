@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Tambah Kategori Pengeluaran</h5>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/kategoripengeluaran/store" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_k_pengeluaran" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" name="deskripsi" rows="10" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Pilih Status</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="status">
                            <option value=""> Pilih Status</option>
                            <option value="Aktif"> Aktif </option>
                            <option value="Tidak Aktif"> Tidak Aktif </option>
                        </select>
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