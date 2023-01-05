@extends('layouts.dashboard')

@section('content')
<h4>Tambah Akun</h4>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/users/store" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control">
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="role">
                            <option value="Bendahara">Bendahara</option>
                        </select>
                        @error('role')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Simpan"> <a
                    href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection