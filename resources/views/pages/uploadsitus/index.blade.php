@extends('layouts.app')
@section('title', 'Daftar Situs Bersejarah')

@section('content')

<body style="background-color: #DBCAB5;">
    <div class="container-fluid custom-background">
        <div class="col-md-2 mt-2">
            <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="container mt-4">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <h1>Daftar Situs Bersejarah</h1>
            <a href="{{ route('uploadsitus.create') }}" class="btn btn-primary">Tambah Situs Baru</a>
            <br><br>
            @if($situs->isEmpty())
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <p>Tidak ada situs bersejarah yang tersedia.</p>
            @else
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
                                <td>
                                    @if($s->gambar_situs)
                                        <img src="{{ asset('storage/'.$s->gambar_situs) }}" alt="Gambar Situs" width="50">
                                    @else
                                        Gambar tidak tersedia
                                    @endif
                                </td>
                                <td>{{ $s->nama_situs }}</td>
                                <td>{{ $s->alamat_situs }}</td>
                                <td>{{ $s->tanggal_berdiri_situs }}</td>
                                <td>{{ $s->pemilik_situs }}</td>
                                <td>{{ $s->jenis_situs }}</td>
                                <td>{{ $s->status_situs }}</td>
                                <td>{{ Str::limit($s->keterangan_situs, 50) }}</td>
                                <td>{{ $s->created_at }}</td>
                                <td>{{ $s->updated_at }}</td>
                                <td>
                                    <a href="{{ route('uploadsitus.edit', $s->id_situs) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('uploadsitus.destroy', $s->id_situs) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus situs ini?')">Hapus</button>
                                    </form>
                                </td>                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
@endsection
