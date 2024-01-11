@extends('layouts.app')
@section('content')
<div class="container-fluid custom-background">
    <div class="col-md-2 ml-auto mt-2">
        <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-4 text-white">
                <h2 style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 34px; font-weight: bold;">Data Progres Formulir</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Instansi</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
                            <th>Jenis Keperluan</th>
                            <th>Keterangan</th>
                            <th>Surat Perizinan</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $formulir)
                            @if($formulir->email === auth()->user()->email)
                                <tr>
                                    <td>{{ $formulir->nama }}</td>
                                    <td>{{ $formulir->instansi }}</td>
                                    <td>{{ $formulir->email }}</td>
                                    <td>{{ $formulir->alamat }}</td>
                                    <td>{{ $formulir->nomor_hp }}</td>
                                    <td>{{ $formulir->jenis_keperluan }}</td>
                                    <td>{{ $formulir->keterangan }}</td>
                                    <td>
                                        <a href="{{ asset('storage/surat_perizinan/' . basename($formulir->surat_perizinan)) }}" target="_blank">
                                            Lihat Surat Perizinan
                                        </a>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/images/' . basename($formulir->gambar)) }}" alt="Gambar" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $formulir->status }}</td>
                                    <td>
                                        <a href="{{ url('storage/' . $formulir->download) }}" target="_blank">Download</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer') 
@endsection
<style>
    .custom-background {
        background-color: #DBCAB5;
        min-height: 100vh;
        padding: 20px;
    }
    .carousel-item {
    border-radius: 20px;
    overflow: hidden;
    }
</style>