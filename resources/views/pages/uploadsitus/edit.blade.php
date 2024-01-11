@extends('layouts.app')

@section('title', 'Edit Situs')

@section('content')
    <div class="container mt-4">
        <h1>Edit Situs</h1>
        <form action="{{ route('uploadsitus.update', $situs->id_situs) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_situs">ID Situs:</label>
                <input type="text" class="form-control" id="id_situs" name="id_situs" value="{{ $situs->id_situs }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Situs:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $situs->nama_situs }}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Situs:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $situs->alamat_situs }}">
            </div>
            <div class="form-group">
                <label for="gambar_situs">Gambar situs:</label>
                <img src="{{ asset('storage/'.$situs->gambar_situs) }}" alt="Gambar Situs" width="50">
                <input type="file" class="form-control" id="gambar_situs" name="gambar_situs">
            </div>        
            <div class="form-group">
                <label for="tanggal_berdiri">Tanggal Berdiri:</label>
                <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri" value="{{ $situs->tanggal_berdiri_situs }}">
            </div>        
            <div class="form-group">
                <label for="pemilik">Kontributor Situs:</label>
                <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ $situs->pemilik_situs }}">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Situs:</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="arsitektur" {{ $situs->jenis_situs == 'arsitektur' ? 'selected' : '' }}>Arsitektur</option>
                    <option value="bangunan" {{ $situs->jenis_situs == 'bangunan' ? 'selected' : '' }}>Bangunan</option>
                    <option value="monumen" {{ $situs->jenis_situs == 'monumen' ? 'selected' : '' }}>Monumen</option>
                    <option value="cagar_budaya" {{ $situs->jenis_situs == 'cagar_budaya' ? 'selected' : '' }}>Cagar Budaya</option>
                    <option value="benda" {{ $situs->jenis_situs == 'benda' ? 'selected' : '' }}>Benda</option>
                    <option value="situs_tak_benda" {{ $situs->jenis_situs == 'situs_tak_benda' ? 'selected' : '' }}>Situs Tak Benda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status Situs:</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $situs->status_situs }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan_situs" rows="5">{{ $situs->keterangan_situs }}</textarea>
            </div>                
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
