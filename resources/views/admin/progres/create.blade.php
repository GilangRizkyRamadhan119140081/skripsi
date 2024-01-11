@extends('layout.app')

@section('title', 'Tambah Progres')

@section('content')
    <h1>Tambah Progres</h1>

    <form action="{{ route('admin.progres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" class="form-control" id="instansi" name="instansi" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
        </div>

        <div class="form-group">
            <label for="jenis_keperluan">Jenis Keperluan</label>
            <input type="text" class="form-control" id="jenis_keperluan" name="jenis_keperluan" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="surat_perizinan">Surat Perizinan</label>
            <input type="file" class="form-control" id="surat_perizinan" name="surat_perizinan" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>

        <div class="form-group">
            <label for="download">Download</label>
            <input type="file" class="form-control-file" id="download" name="download" accept=".pdf, .doc, .docx" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
