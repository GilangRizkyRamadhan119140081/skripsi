@extends('layout.app')

@section('title', 'Daftar Informasi')

@section('content')
    <h1>Daftar informasi Bersejarah</h1>
    <a href="{{ route('informasi.create') }}" class="btn btn-primary">Tambah informasi Baru</a>
    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID informasi</th>
                <th>Gambar informasi</th>
                <th>Judul informasi</th>
                <th>Alamat informasi</th>
                <th>Tanggal informasi</th>
                <th>Pemilik informasi</th>
                <th>Keterangan informasi</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informasi as $s)
                <tr>
                    <td>{{ $s->id_informasi }}</td>
                    {{-- @dd(asset('storage/gambar/' . $s->gambar_informasi)) --}}
                    <td><img src="{{ asset('storage/' . $s->gambar_informasi) }}" alt="Gambar informasi" width="50"></td>
                    <td>{{ $s->judul_informasi }}</td>
                    <td>{{ $s->alamat_informasi }}</td>
                    <td>{{ $s->tanggal_informasi }}</td>
                    <td>{{ $s->pemilik_informasi }}</td>
                    <td>{{ $s->keterangan_informasi }}</td>
                    <td>{{ $s->created_at }}</td>
                    <td>{{ $s->updated_at }}</td>
                    <td>
                        <a href="{{ route('informasi.edit', $s->id_informasi) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('informasi.destroy', $s->id_informasi) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">Hapus</button>
                        </form>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
