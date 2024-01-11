@extends('layout.app')

@section('title', 'Daftar Admin')

@section('content')
    <h1>Daftar Admin</h1>

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
            @forelse ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form action="{{ route('admin.updateRole', $admin->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="role" class="form-select" aria-label="Role">
                                <option value="0" {{ $admin->role == 0 ? 'selected' : '' }}>SuperAdmin</option>
                                <option value="1" {{ $admin->role == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $admin->role == 2 ? 'selected' : '' }}>Moderator</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </td>
                    <td>
                        @if ($admin->isAdmin())
                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada admin yang ditemukan.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
@endsection

