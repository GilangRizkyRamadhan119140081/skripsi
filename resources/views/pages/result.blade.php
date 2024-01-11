@extends('layouts.app')
@section('title', 'Daftar Informasi')
@section('content')
<style>
    .custom-background {
        background-color: #DBCAB5;
        min-height: 100vh;
        padding: 20px;
    }
</style>
<div class="container-fluid custom-background">
    <div class="col-md-2 ml-auto mt-2">
        <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="row justify-content-center" data-aos="fade-right">
        <div class="mt-4 p-5 bg-warning text-dark rounded" data-aos="zoom-in-up">
            <h1>#Jelajahi dan Temukan</h1>
            <p>Informasi lengkap seputar situs bersejarah di kota bandar lampung</p>
        </div>
    </div>
    <div class="container mt-5" data-aos="zoom-in" data-aos="fade-right">
        <h3 class="text-center mb-4">Daftar Hasil Pencarian</h3>
        <div class="row justify-content-center">
            @foreach ($items as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="card-title">{{ $item->nama_situs }}</h2>
                            <p>ID Situs: {{ $item->id_situs }}</p>
                            <img src="{{ asset("storage/{$item->gambar_situs}") }}" alt="{{ $item->nama_situs }}" class="img-thumbnail">
                            <p>Alamat Situs: {{ $item->alamat_situs }}</p>
                            <a href="{{ route('detail.situs', $item->id_situs) }}" class="btn btn-danger">
                                <i class="fa fa-sign-in"></i> Lihat Detail
                            </a>                                                    
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
