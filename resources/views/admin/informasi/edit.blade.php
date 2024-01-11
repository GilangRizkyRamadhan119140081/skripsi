@extends('layout.app')

@section('title', 'Edit Informasi')

@section('content')
    <h1>Edit informasi</h1>
    <form action="{{ route('informasi.update', $informasi->id_informasi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_informasi">ID informasi:</label>
            <input type="text" class="form-control" id="id_informasi" name="id_informasi" value="{{ $informasi->id_informasi }}" required>
        </div>
        <div class="form-group">
            <label for="judul_informasi">judul informasi:</label>
            <input type="text" class="form-control" id="judul_informasi" name="judul_informasi" value="{{ $informasi->judul_informasi }}" required>
        </div>
        <div class="form-group">
            <label for="alamat_informasi">alamat informasi:</label>
            <input type="text" class="form-control" id="alamat_informasi" name="alamat_informasi" value="{{ $informasi->alamat_informasi }}" required>
        </div>
        
        <div class="form-group">
            <label for="gambar_informasi">Gambar informasi:</label>
            <input type="file" class="form-control" id="gambar_informasi" name="gambar_informasi" required>
        </div>
        <div class="form-group">
            <label for="tanggal_informasi">Tanggal informasi:</label>
            <input type="date" class="form-control" id="tanggal_informasi" name="tanggal_informasi" value="{{ $informasi->tanggal_informasi }}" required>
        </div>
        <div class="form-group">
            <label for="pemilik_informasi">Pemilik informasi:</label>
            <input type="text" class="form-control" id="pemilik_informasi" name="pemilik_informasi" value="{{ $informasi->pemilik_informasi }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan_informasi">Keterangan informasi:</label>
            <textarea class="form-control" id="keterangan_informasi" name="keterangan_informasi" required>{{ $informasi->keterangan_informasi }}</textarea>
        </div>                
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
