@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h3>Departemen</h3>
</div>
<div class="page-content">
        <a class="btn btn-success mb-3" href="/kategoripemasukan/create">Tambah</a>
        <div class="card">
            <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                @foreach($kategoripemasukan as $ks)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ks->nama_k_pemasukan}}</td>
                        <td>{{$ks->deskripsi}}</td>
                        <td>{{$ks->status}}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning btn-sm" href="/kategoripemasukan/{{$ks->id}}/edit">Edit</a>
                            <form action="/kategoripemasukan/{{$ks->id}}" method="POST">
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


