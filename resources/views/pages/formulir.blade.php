@extends('layouts.app')
@section('content')
<head>
    <script src="https://kit.fontawesome.com/2f5323979c.js" crossorigin="anonymous"></script>
</head>
<div class="container-fluid custom-background">
    <div class="row mt-2">
        <div class="col-md-2 ml-auto">
            <a href="javascript:history.back()" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-2 ml-auto">
            <a href="{{ route('pages.progres') }}" class="btn btn-primary"><i class="fas fa-history"></i> History</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 mt-4 text-white">
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif

            <h1 class="text-center" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                <i class="fas fa-book"></i> Halaman Pengajuan
            </h1>
            <div class="container" style="color: #402515;">
                <h1 class="mt-4">Formulir Pengajuan</h1>
                <form action="{{ route('formulir.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                            <div class="form-group">
                                <label for="instansi">Instansi</label>
                                <input type="text" class="form-control" id="instansi" name="instansi" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                            </div>                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Jenis Keperluan</label>
                                <select class="form-control" id="jenis_keperluan" name="jenis_keperluan" required>
                                    <option value="Pengajuan Kontributor">Pengajuan Kontributor</option>
                                    <option value="Pengajuan Situs">Pengajuan Situs</option>
                                    <option value="Pengajuan Penelitian">Pengajuan Penelitian</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="surat_perizinan">Upload Surat Perizinan</label>
                                <input type="file" class="form-control-file" id="surat_perizinan" name="surat_perizinan" accept=".pdf, .doc, .docx" required>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload Gambar</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
        @endsection
        
        <style>
            .custom-background {
                background-color: #DBCAB5;
                min-height: 100vh;
                padding: 20px;
            }
            .carousel-item {
                border-radius: 20px;
                overflow: hidden;
            }
        </style>