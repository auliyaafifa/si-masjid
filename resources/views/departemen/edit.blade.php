@extends('layouts.dashboard')

@section('content')
<h1>Ubah Departemen</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/departemen/{{$departemen->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Departemen</label>
                <input type="text" name="nama_departemen" class="form-control" value="{{$departemen->nama_departemen}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kepala Departemen</label>
                <input type="text" name="nama_kepala_dept" class="form-control" value="{{$departemen->nama_kepala_dept}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
            </div>
            <textarea class="form-control" name="deskripsi" rows="10">{{$departemen->deskripsi}}</textarea><br>
            <select class="form-select" name="status" value="{{$departemen->status}}">
                <option value=""> Pilih Status</option>
                <option value="Aktif" @if($departemen->status == "Aktif") selected @endif>Aktif </option>
                <option value="Tidak Aktif" @if($departemen->status == "Tidak Aktif") selected @endif>Tidak Aktif </option>
            </select><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui">
        </form>
    </div>
@endsection
