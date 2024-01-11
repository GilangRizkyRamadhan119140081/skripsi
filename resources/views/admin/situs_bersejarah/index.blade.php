@extends('layout.app')

@section('title', 'Daftar Situs Bersejarah')

@section('content')
    <h1>Daftar Situs Bersejarah</h1>
    <a href="{{ route('situs.create') }}" class="btn btn-primary">Tambah Situs Baru</a>
    <a href="{{ route('situs.download', ['format' => 'csv']) }}" class="btn btn-success">Unduh Data CSV</a>
    <a href="{{ route('situs.dokumen') }}" class="btn btn-danger">Unduh Data PDF</a>

    <br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Situs</th>
                <th>Gambar Situs</th>
                <th>Nama Situs</th>
                <th>Alamat Situs</th>
                <th>Tanggal Berdiri Situs</th>
                <th>Kontributor Situs</th>
                <th>Jenis Situs</th>
                <th>Status Situs</th>
                <th>Keterangan Situs</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($situs as $s)
                <tr>
                    <td>{{ $s->id_situs }}</td>
                    <td><img src="{{ asset('storage/'.$s->gambar_situs) }}" alt="Gambar Situs" width="50"></td>
                    <td>{{ $s->nama_situs }}</td>
                    <td>{{ $s->alamat_situs }}</td>
                    <td>{{ $s->tanggal_berdiri_situs }}</td>
                    <td>{{ $s->pemilik_situs }}</td>
                    <td>{{ $s->jenis_situs }}</td>
                    <td>{{ $s->status_situs }}</td>
                    <td>{{ Str::limit($s->keterangan_situs, 5) }}</td>
                    <td>{{ $s->created_at }}</td>
                    <td>{{ $s->updated_at }}</td>
                    <td>
                        <a href="{{ route('situs.edit', $s->id_situs) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('situs.destroy', $s->id_situs) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus situs ini?')">Hapus</button>
                        </form>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
