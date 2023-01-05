@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h5>Daftar Kategori Pengeluaran</h5>
</div>
<div class="page-content">
    @if (in_array(auth()->user()->role, ['Bendahara']))
    <a class="btn btn-success mb-3" href="/kategoripengeluaran/create">Tambah</a>
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
                @foreach($kategoripengeluaran as $kk)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kk->nama_k_pengeluaran}}</td>
                    <td>{{$kk->deskripsi}}</td>
                    <td>{{$kk->status}}</td>
                    <td style="white-space: nowrap">
                        @if (in_array(auth()->user()->role, ['Bendahara']))
                        <a class="btn btn-warning btn-sm" href="/kategoripengeluaran/{{$kk->id}}/edit">Edit</a>
                        {{-- <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#delete{{$kk->id}}">Hapus</button>
                        <div class="modal fade" id="delete{{$kk->id}}" tabindex="-1"
                            aria-labelledby="delete{{$kk->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete{{$kk->id}}Label">Apakah Anda yakin?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <form action="/kategoripengeluaran/{{$kk->id}}" method="POST" class="modal-footer">
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

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endsection