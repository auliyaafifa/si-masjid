@extends('layouts.dashboard')

@section('content')
<h1>Ubah Akun</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/users/{{$user->id}}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-select" name="role">
                    <option value="Pengurus" @selected($user->role === 'Pengurus')>Pengurus</option>
                    <option value="Bendahara" @selected($user->role === 'Bendahara')>Bendahara</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Perbarui">
        </form>
    </div>
@endsection
