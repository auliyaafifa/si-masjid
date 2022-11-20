@extends('layouts.dashboard')

@section('content')
    <div class="container"><br>
        <a class="btn btn-success mb-3" href="/kategoripengeluaran/create">Tambah</a>
        <div class="card">
            <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                @foreach($kategoripengeluaran as $kk)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kk->nama_k_pengeluaran}}</td>
                        <td>{{$kk->deskripsi}}</td>
                        <td>{{$kk->status}}</td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning btn-sm" href="/kategoripengeluaran/{{$kk->id}}/edit">Edit</a>
                            <form action="/kategoripengeluaran/{{$kk->id}}" method="POST">
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


