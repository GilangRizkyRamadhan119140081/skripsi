<!-- resources/views/admin/progres/edit.blade.php -->
@extends('layout.app')

@section('title', 'Edit Progres')

@section('content')
    <h1>Edit Progres</h1>

    <form action="{{ route('admin.progres.update', $formulir->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <div class="form-group">
            <label for="instansi">Instansi</label>
            <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi', $formulir->instansi) }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $formulir->alamat) }}</textarea>
        </div>

        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $formulir->nomor_hp) }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_keperluan">Jenis Keperluan</label>
            <input type="text" class="form-control" id="jenis_keperluan" name="jenis_keperluan" value="{{ old('jenis_keperluan', $formulir->jenis_keperluan) }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan', $formulir->keterangan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="surat_perizinan">Surat Perizinan</label>
            @if ($formulir->surat_perizinan)
                <p class="mt-2"><strong>Surat Perizinan Saat Ini:</strong> <a href="{{ asset('storage/surat_perizinan/' . basename($formulir->surat_perizinan)) }}" target="_blank">Lihat</a></p>
            @endif
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar</label>
            @if ($formulir->gambar)
                <p class="mt-2"><strong>Gambar Saat Ini:</strong> <a href="{{ asset('storage/images/' . basename($formulir->gambar)) }}" target="_blank">Lihat</a></p>
            @endif
        </div>

        {{-- <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Diproses" {{ old('status', $formulir->status) === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Diterima" {{ old('status', $formulir->status) === 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ old('status', $formulir->status) === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div> --}}

        <div class="form-group">
            <label for="download">Download</label>
            <input type="file" class="form-control-file" id="download" name="download" accept=".pdf, .doc, .docx" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
