@extends('layouts.master')

@section('content')
<h1>Tambah Departemen</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/departemen/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Departemen</label>
                <input type="text" name="nama_departemen" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kepala Departemen</label>
                <input type="text" name="nama_kepala_dept" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            </div>
            <textarea class="form-control" name="deskripsi" rows="10"></textarea><br>
            <select class="form-select" name="status">
                <option value=""> Pilih Status</option>
                <option value="Aktif"> Aktif </option>
                <option value="Tidak Aktif"> Tidak Aktif </option>
            </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
    </div>
@endsection
