<!-- resources/views/admin/user/edit.blade.php -->

@extends('layout.app')

@section('title', 'Edit Pengguna')

@section('content')
    <h1>Edit Pengguna</h1>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>

        <label for="role">Role:</label>
        <select name="role" class="form-select" aria-label="Role">
            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Kontributor</option>
            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin/Moderator</option>
        </select>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
