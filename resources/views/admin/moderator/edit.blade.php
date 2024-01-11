@extends('layout.app')

@section('title', 'Edit Moderator')

@section('content')
    <h1>Edit Moderator</h1>
    <form action="{{ route('admin.moderator.update', $moderator->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $moderator->nama }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $moderator->email }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $moderator->alamat }}</textarea>
            @error('alamat')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label>No_Telp</label>
            <input type="number" name="no_telp" class="form-control" value="{{ $moderator->no_telp }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
