@extends('layouts.app')

@section('title', 'Data')

@section('content')
<body style="background-color: #DFBD41;">
    <div class="container-fluid custom-background">
        <div class="col-md-2 ml-auto mt-2">
            <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="container">
            <h1>Data Situs Bersejarah</h1>
            <a href="{{ route('situs.dokumen') }}" class="btn btn-danger">Unduh Data PDF</a>
            <a href="{{ route('data.download') }}" class="btn btn-primary">Unduh Data CSV</a>
            @if($data->isEmpty())
                <p>Tidak ada data situs bersejarah yang tersedia.</p>
            @else
                <table class="table table-striped table-bordered" id="yourTableId">
                    <thead>
                        <tr>
                            <th>ID Situs</th>
                            <th>Nama Situs</th>
                            <th>Alamat Situs</th>
                            <th>Tanggal Berdiri</th>
                            <th>Kontributor Situs</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id_situs }}</td>
                                <td>{{ $item->nama_situs }}</td>
                                <td>{{ $item->alamat_situs }}</td>
                                <td>{{ $item->tanggal_berdiri_situs }}</td>
                                <td>{{ $item->pemilik_situs }}</td>
                                <td>{{ $item->jenis_situs }}</td>
                                <td>{{ $item->status_situs }}</td>
                                <td>{{ Str::limit($item->keterangan_situs, 50) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="mt-4 text-black">
                <h1>Data Pengajuan</h1>
                <a href="{{ route('admin.progres.download') }}" class="btn btn-danger">Unduh Laporan PDF</a>
                <a href="{{ route('data.download') }}" class="btn btn-primary">Unduh Data CSV</a>
                @if($formulirs->isEmpty())
                    <p>Tidak ada data pengajuan situs bersejarah yang tersedia.</p>
                @else
                    <table class="table table-bordered" id="pengajuanTable">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formulirs as $formulir)
                                @if($formulir->email === auth()->user()->email)
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
                                        <td>{{ $formulir->status }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>

@endsection

@section('styles')
    <style>
        .custom-background {
            min-height: 100vh;
            padding: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        #yourTableId, #pengajuanTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #yourTableId th, #yourTableId td, #pengajuanTable th, #pengajuanTable td {
            padding: 12px;
        }
    </style>
