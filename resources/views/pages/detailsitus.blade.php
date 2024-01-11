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
            <div class="card">
                <div class="card-header">
                    Detail Situs
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $situs->nama_situs }}</h2>
                    <p>ID Situs: {{ $situs->id_situs }}</p>
                    <img src="{{ asset("storage/{$situs->gambar_situs}") }}" alt="{{ $situs->nama_situs }}" class="img-thumbnail">
                    <p>Alamat Situs: <a href="https://www.google.com/search?q={{ $situs->alamat_situs }}" target="_blank">Alamat Situs: {{ $situs->alamat_situs }}</a></p>
                    <p>Tanggal Berdiri Situs: {{ $situs->tanggal_berdiri_situs }}</p>
                    <p>Kontributor Situs: {{ $situs->pemilik_situs }}</p>
                    <p>Jenis Situs: {{ $situs->jenis_situs }}</p>
                    <p>Status Situs: {{ $situs->status_situs }}</p>
                    <p class="keterangan-situs">{{ $situs->keterangan_situs }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.komentar')

    {{-- @if(isset($komentars) && $komentars->count() > 0)
        <h3>Komentar:</h3>
        <ul>
            @foreach($komentars as $komentar)
                <li>{{ $komentar->content }}</li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada komentar.</p>
    @endif --}}
    {{-- @foreach ($komentar as $komen)
    <p> ID : {{ $komen->user_id }}</p>
    <p> Komentar : {{ $komen->message }}</p> --}}
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <h1>Comments</h1>
        </div>

        @foreach ($komentar as $komen)
        <div class="col-md-8 mt-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Nama : {{ $komen->nama }}</h5>
                    <p class="card-text">Komentar : {{ $komen->message }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Terakhir Diperbarui </small>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    {{-- @endforeach --}}

</div>
@include('layouts.footer')
@endsection
