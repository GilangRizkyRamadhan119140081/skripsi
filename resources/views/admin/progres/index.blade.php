@extends('layout.app')

@section('title', 'Daftar Pengajuan')

@section('content')
    <h1>Daftar Pengajuan</h1>
    <a href="{{ route('admin.progres.download') }}" class="btn btn-success mb-3">Unduh Laporan Pengajuan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nomor HP</th>
                <th>Jenis Keperluan</th>
                <th>Keterangan</th>
                <th>Surat Perizinan</th>
                <th>Gambar</th>
                <th>Status</th>
                <th>Download</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($formulirs as $formulir)
                <tr>
                    <td>{{ $formulir->nama }}</td>
                    <td>{{ $formulir->instansi }}</td>
                    <td>{{ $formulir->email }}</td>
                    <td>{{ $formulir->alamat }}</td>
                    <td>{{ $formulir->nomor_hp }}</td>
                    <td>{{ $formulir->jenis_keperluan }}</td>
                    <td>{{ $formulir->keterangan }}</td>
                    <td>
                        <a href="{{ asset('storage/surat_perizinan/' . basename($formulir->surat_perizinan)) }}" target="_blank">
                            Lihat Surat Perizinan
                        </a>
                    </td>
                    <td>
                        <img src="{{ asset('storage/images/' . basename($formulir->gambar)) }}" alt="Gambar" style="max-width: 100px;">
                    </td>
                    <td>
                        <!-- Dropdown untuk memilih status -->
                        <form action="{{ route('admin.progres.update', $formulir->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="Diajukan" {{ $formulir->status == 'Diajukan' ? 'selected' : '' }}>Diajukan</option>
                                    <option value="Diproses" {{ $formulir->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="Ditolak" {{ $formulir->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    <option value="Diterima" {{ $formulir->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ asset('storage/download/' . basename($formulir->download)) }}" target="_blank">
                            Download
                        </a>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Aksi">
                            <a href="{{ route('admin.progres.preview', $formulir->id) }}" class="btn btn-success btn-sm">Preview</a>
                            <a href="{{ route('admin.progres.edit', $formulir->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.progres.destroy', $formulir->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus formulir ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
