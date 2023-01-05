@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Daftar Kategori Pemasukan</h5>
</div>
<div class="page-content">
    @if (in_array(auth()->user()->role, ['Bendahara']))
    <a class="btn btn-success mb-3" href="/kategoripemasukan/create">Tambah</a>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
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
                            @if (in_array(auth()->user()->role, ['Bendahara']))
                            <a class="btn btn-warning btn-sm" href="/kategoripemasukan/{{$ks->id}}/edit">Edit</a>
                            {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#delete{{$ks->id}}">Hapus</button>
                            <div class="modal fade" id="delete{{$ks->id}}" tabindex="-1"
                                aria-labelledby="delete{{$ks->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="delete{{$ks->id}}Label">Apakah Anda yakin?
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <form action="/kategoripemasukan/{{$ks->id}}" method="POST"
                                            class="modal-footer">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div> --}}
                                @else
                                -
                                @endif
                            </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection