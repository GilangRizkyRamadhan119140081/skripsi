@extends('layout.app')

@section('title', 'Tambah Situs Baru')

@section('content')
    <h1>Tambah Situs Baru</h1>
    <form action="{{ route('situs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-group">
            <label for="id_situs">ID Situs:</label>
            <input type="text" class="form-control" id="id_situs" name="id_situs">
        </div> --}}
        <div class="form-group">
            <label for="nama">Nama Situs:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Situs:</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        <div class="form-group">
            <label for="gambar_situs">Gambar situs:</label>
            <input type="file" class="form-control" id="gambar_situs" name="gambar_situs">
        </div>
        <div class="form-group">
            <label for="tanggal_berdiri">Tanggal Berdiri:</label>
            <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri">
        </div>
        <div class="form-group">
            <label for="pemilik">Kontributor Situs:</label>
            <input type="text" class="form-control" id="pemilik" name="pemilik">
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Situs:</label>
            <select class="form-control" id="jenis" name="jenis">
                <option value="arsitektur">Arsitektur</option>
                <option value="bangunan">Bangunan</option>
                <option value="monumen">Monumen</option>
                <option value="cagar_budaya">Cagar Budaya</option>
                <option value="benda">Benda</option>
                <option value="situs_tak_benda">Situs Tak Benda</option>
            </select>
        </div>        
        <div class="form-group">
            <label for="status">Status Situs:</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan_situs" rows="20"></textarea>
        </div>                             
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection
