@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    @if(auth()->guard('admin')->check())
    @if(auth()->guard('admin')->user()->isSuperAdmin())
        <p>Ini adalah halaman dashboard admin.</p>
    @elseif(auth()->guard('admin')->user()->isAdmin())
        <p>Ini adalah halaman dashboard kontributor.</p>
    @elseif(auth()->guard('admin')->user()->isModerator())
        <p>Ini adalah halaman dashboard moderator.</p>
    @else
        <p>Ini adalah halaman dashboard untuk pengguna lain.</p>
    @endif
@else
    <p>Silakan login untuk mengakses dashboard.</p>
@endif


    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Kontributor</h5>
                    <p class="card-text">Total: {{ $jumlahKontributor }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Moderator</h5>
                    <p class="card-text">Total: {{ $jumlahModerator }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Situs Bersejarah</h5>
                    <p class="card-text">Total: {{ $jumlahSitusBersejarah }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Informasi</h5>
                    <p class="card-text">Total: {{ $jumlahInformasi }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah User</h5>
                    <p class="card-text">Total: {{ $jumlahUser }}</p>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('topbar')
@endsection
