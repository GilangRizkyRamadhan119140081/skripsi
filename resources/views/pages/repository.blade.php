@extends('layouts.app')

@section('title', 'Detail Situs')

@section('content')
<style>
    .custom-background {
        background-color: #DBCAB5;
        min-height: 100vh;
        padding: 20px;
    }

    .keterangan-situs {
        text-align: justify;
        margin-top: 10px;
    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .keterangan-situs {
        text-align: justify;
    }

    .btn-secondary {
        font-size: 16px;
    }

</style>

<div class="container-fluid custom-background">
    <div class="col-md-2 ml-auto mt-2">
        <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            @foreach ($situs as $s)
            <div class="card">
                <div class="card-body">
                    <a href="repository/{{$s->id_situs}}"><h2 class="card-title">{{ $s->nama_situs }}</h2></a>
                    <p>Kontributor Situs: {{ $s->pemilik_situs }}</p>
                    <p>Alamat Situs: <a href="https://www.google.com/search?q={{ $s->alamat_situs }}" target="_blank">Alamat Situs: {{ $s->alamat_situs }}</a></p>
                    <p>Tanggal Berdiri Situs: {{ $s->tanggal_berdiri_situs }}</p>
                    <p class="keterangan-situs">{{ $s->keterangan_situs }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    
    {{-- @include('layouts.komentar') --}}
</div>
@include('layouts.footer')
@endsection
