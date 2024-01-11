@extends('layout.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <h1>Daftar Pengguna</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.user.updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role" class="form-select" aria-label="Role">
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Kontributor</option>
                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Admin/Moderator</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada pengguna yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
