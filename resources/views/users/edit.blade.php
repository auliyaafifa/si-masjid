@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h1>Ubah Akun</h1>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/users/{{$user->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-4">
                        <select class="form-select" name="role">
                            <option value="Bendahara" @selected($user->role === 'Bendahara')>Bendahara</option>
                            <option value="Ketua" @selected($user->role === 'Ketua')>Ketua</option>
                        </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Perbarui"> <a
                    href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection