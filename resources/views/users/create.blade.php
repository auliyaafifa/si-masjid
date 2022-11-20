@extends('layouts.dashboard')

@section('content')
<h1>Tambah Akun</h1>
    <div class="container">
        <div class="card">
        <div class="card-body">
        <form action="/users/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control">
                @error('name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select class="form-select" name="role">
                    <option value="Pengurus">Pengurus</option>
                    <option value="Bendahara">Bendahara</option>
                </select>
                @error('role')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
        </form>
    </div>
@endsection
