@extends('layout.app')

@section('title', 'Tambah informasi Baru')

@section('content')
    <h1>Tambah informasi Baru</h1>
    <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_informasi">ID informasi:</label>
            <input type="text" class="form-control" id="id_informasi" name="id_informasi">
        </div>
        <div class="form-group">
            <label for="judul_informasi">Judul informasi:</label>
            <input type="text" class="form-control" id="judul_informasi" name="judul_informasi">
        </div>
        
        <div class="form-group">
            <label for="alamat_informasi">Alamat informasi:</label>
            <input type="text" class="form-control" id="alamat_informasi" name="alamat_informasi">
        </div>
        
        <div class="form-group">
            <label for="gambar_informasi">Gambar informasi:</label>
            <input type="file" class="form-control" id="gambar_informasi" name="gambar_informasi">
        </div>
        
        <div class="form-group">
            <label for="tanggal_informasi">Tanggal Informasi:</label>
            <input type="date" class="form-control" id="tanggal_informasi" name="tanggal_informasi">
        </div>
        <div class="form-group">
            <label for="pemilik_informasi">Pemilik informasi:</label>
            <input type="text" class="form-control" id="pemilik_informasi" name="pemilik_informasi">
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan_informasi"></textarea>
        </div>                     
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
