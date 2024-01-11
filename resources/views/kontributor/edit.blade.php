@extends('layout.app')

@section('title', 'Edit Kontributor')

@section('content')
    <h1>Edit Kontributor</h1>
    <form action="{{ route('kontributor.update', $kontributor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kontributor->nama }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $kontributor->email }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $kontributor->alamat }}</textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label>No_Telp</label>
            <input type="number" name="no_telp" class="form-control" value="{{ $kontributor->no_telp }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
