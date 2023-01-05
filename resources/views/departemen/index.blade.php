@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Daftar Departemen</h5>
</div>
<div class="page-content">
    @if (in_array(auth()->user()->role, ['Bendahara']))
    <a class="btn btn-success mb-3" href="/departemen/create">Tambah</a>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Penanggungjawab</th>
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
                    <td style="white-space: nowrap">
                        {{-- <a class="btn btn-warning btn-sm" href="/departemen/{{$d->id}}/edit">Edit</a>
                        <form action="/departemen/{{$d->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
                        </form> --}}

                        @if (in_array(auth()->user()->role, ['Bendahara']))
                        <a class="btn btn-warning btn-sm" href="/departemen/{{$d->id}}/edit">Edit</a>
                        {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#delete{{$d->id}}">Hapus</button>
                        <div class="modal fade" id="delete{{$d->id}}" tabindex="-1"
                            aria-labelledby="delete{{$d->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete{{$d->id}}Label">Apakah Anda yakin?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <form action="/departemen/{{$d->id}}" method="POST" class="modal-footer">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        @else
                        -
                        @endif

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    @endsection