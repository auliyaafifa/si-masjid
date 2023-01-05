@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h3>Daftar Akun</h3>
</div>
<div class="page-content">
    <a class="btn btn-success mb-3" href="/users/create">Tambah</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
                @foreach($users as $u)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->role}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning btn-sm" href="/users/{{$u->id}}/edit">Edit</a>
                            @if($u->id !== auth()->id())
                            <form action="/users/{{$u->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection