@extends('layout.app')

@section('title', 'Pratinjau Formulir')

@section('content')
    <h1>Pratinjau Formulir</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informasi Formulir</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nama:</strong> {{ $formulir->nama }}</li>
                <li class="list-group-item"><strong>Instansi:</strong> {{ $formulir->instansi }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $formulir->email }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $formulir->alamat }}</li>
                <li class="list-group-item"><strong>Nomor HP:</strong> {{ $formulir->nomor_hp }}</li>
                <li class="list-group-item"><strong>Jenis Keperluan:</strong> {{ $formulir->jenis_keperluan }}</li>
                <li class="list-group-item"><strong>Keterangan:</strong> {{ $formulir->keterangan }}</li>
                <li class="list-group-item">
                    <strong>Surat Perizinan:</strong>
                    <a href="{{ asset('storage/surat_perizinan/' . basename($formulir->surat_perizinan)) }}" target="_blank">
                        Lihat Surat Perizinan
                    </a>
                </li>
                <li class="list-group-item">
                    <strong>Gambar:</strong>
                    <img src="{{ asset('storage/images/' . basename($formulir->gambar)) }}" alt="Gambar" style="max-width: 100px;">
                </li>
                <li class="list-group-item"><strong>Status:</strong> {{ $formulir->status }}</li>
                <li class="list-group-item">
                    <strong>Download:</strong>
                    <a href="{{ asset('storage/download/' . basename($formulir->download)) }}" target="_blank">
                        Download
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <a href="{{ route('admin.progres.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection
