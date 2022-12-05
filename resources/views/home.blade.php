@extends('layouts.dashboard')

@section('content')
<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-center" >
                <div class="card-body" style="padding-top: 8rem; padding-bottom: 8rem;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h6>Selamat Datang
                        <b>{{Auth::user()->name}}</b>, Anda Login sebagai 
                        <b>{{Auth::user()->role}}</b>
                    </h6>

                    <div class="text-center">
                        <img src="{{ asset('img/ikon.jpg') }}" class="rounded" alt="...">
                    </div>

                    {{ __('Kamu telah masuk') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection