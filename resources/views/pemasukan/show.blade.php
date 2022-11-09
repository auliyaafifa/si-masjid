<!-- @extends('layouts.master')

@section('content')
<h1>Detail Pemasukan</h1>
    <div class="container">
        <div class="card"><div class="card-body">
        <form action="/pemasukan/{{$pemasukan->id}}" method="POST">
            @method('put')
            @csrf
            <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div>
                            <h2>Detail Pemasukan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal:</strong>
                            {{ $pemasukan->tanggal }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kategori:</strong>
                            {{ $pemasukan->kategori_id }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jumlah:</strong>
                            {{ $pemasukan->jumlah }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            {{ $pemasukan->deskripsi }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Departemen:</strong>
                            {{ $pemasukan->departemen_id }}
                        </div>
                    </div>  
                </div>
            </div>
        </form>
        </div><br>
                <input type="back" class="btn btn-primary" name="back" value="Kembali"><br>
@endsection -->