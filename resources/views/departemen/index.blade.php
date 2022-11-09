@extends('layouts.master')

@section('content')
    <div class="container"><br>
        <a class="btn btn-success mb-3" href="/departemen/create">Tambah</a>
            <div class="card">
            <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Departemen</th>
                    <th>Kepala Departemen</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                @foreach($departemen as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->nama_departemen}}</td>
                        <td>{{$d->nama_kepala_dept}}</td>
                        <td>{{$d->deskripsi}}</td>
                        <td>{{$d->status}}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning btn-sm" href="/departemen/{{$d->id}}/edit">Edit</a>
                            <form action="/departemen/{{$d->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

@endsection


