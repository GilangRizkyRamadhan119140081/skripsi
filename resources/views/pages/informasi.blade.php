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
        <div class="row justify-content-center" data-aos="fade-right">
            <div class="col-md-12 text-center">
                <h1>Dinas Kebudayaan Kota Bandar Lampung</h1>
                <p class="lower-third">
                    <i class="fas fa-gem" data-aos="fade-left"></i> Informasi Terbaru
                </p>
            </div>
        </div>
        <div class="mt-4 p-5 bg-warning text-dark rounded" data-aos="zoom-in-up">
            <h1>Daftar Berita dan Acara</h1>
            <p>Kumpulan Informasi dan Acara Dinas Kebudayaan Kota Bandar Lampung</p>
        </div>
        @foreach ($informasi as $info)
        <div class="container mt-5 border rounded p-4" data-aos="zoom-in">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1>{{ $info->judul_informasi }}</h1>
                    <p class="card-text">{{ $info->tanggal_informasi }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <img class="card-img-top rounded mx-auto d-block" src="{{ asset('storage/' . $info->gambar_informasi) }}" alt="{{ $info->judul_informasi }}">
                    <p class="mt-3 text-justify">{{ $info->keterangan_informasi }}</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="mt-4 p-5 bg-warning text-dark rounded" data-aos="zoom-in-up">
            <h1>Ingat!</h1>
            <p>Pastikan untuk selalu mendapatkan informsi terbaru seputar berita dan acara kebudayaan yang valid disini.</p>
        </div>
        <div class="container mt-5" data-aos="zoom-in" data-aos="fade-right">
            <h3 class="text-center mb-4">Berita Terbaru</h3>
            <div class="row justify-content-center">
                @if(isset($informasi) && count($informasi) > 0)
                    @php $counter = 0; @endphp
                    @foreach ($informasi as $info)
                        @if($counter < 3)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top rounded" src="{{ asset('storage/' . $info->gambar_informasi) }}" alt="{{ $info->judul_informasi }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $info->judul_informasi }}</h5>
                                        <p class="card-text">{{ $info->tanggal_informasi }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                @else
                    <div class="col-md-12" data-aos="fade-left">
                        <p class="text-center">Tidak ada informasi yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@include('layouts.footer')
@endsection
