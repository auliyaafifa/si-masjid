@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Ubah Departemen</h5>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/departemen/{{$departemen->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_departemen" class="form-control"
                            value="{{$departemen->nama_departemen}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Penanggungjawab</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_kepala_dept" class="form-control"
                            value="{{$departemen->nama_kepala_dept}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" class="form-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="deskripsi" value="{{$departemen->deskripsi}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label" class="form-label">Pilih Status</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="status" value="{{$departemen->status}}">
                            <option value=""> Pilih Status</option>
                            <option value="Aktif" @if($departemen->status == "Aktif") selected @endif>Aktif </option>
                            <option value="Tidak Aktif" @if($departemen->status == "Tidak Aktif") selected @endif>Tidak
                                Aktif
                            </option>
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Perbarui"> <a
                    href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
        @endsection