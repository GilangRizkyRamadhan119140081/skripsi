@extends('layouts.app')
@section('content')
@php
    $situs = App\Models\SitusBersejarah::all(); // Gantilah sesuai namespace yang digunakan di model SitusBersejarah
@endphp

<head>
    <script src="https://kit.fontawesome.com/2f5323979c.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #DBCAB5;">
    <div class="container-fluid custom-background">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 text-white">
                    <div class="mb-4">
                        <h1 class="text-center" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                            <i class="fas fa-landmark" data-aos="fade-right"></i> Histopedia
                        </h1>
                        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('/images/hm1.jpg') }}" alt="Gambar 1" style="width:100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/images/hm2.jpeg') }}" alt="Gambar 2" style="width:100%; height: 400px; object-fit: cover;">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('/images/hm3.jpg') }}" alt="Gambar 3" style="width:100%; height: 400px; object-fit: cover;">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        
                        <div class="mt-4 p-5 bg-warning text-dark rounded" data-aos="zoom-in">
                            <h1 class="mb-4">Selamat Datang di Histopedia</h1>
                            <p>
                                Histopedia adalah sebuah kumpulan informasi atau pengetahuan yang disusun secara sistematis, biasanya dalam bentuk buku atau sumber referensi lainnya dengan mencakup berbagai topik dan subjek, memberikan penjelasan mendalam tentang fakta, konsep, dan peristiwa.
                            </p>
                        </div>
                        
                        <div class="container mt-4">
                            <form action="{{ route('pages.result') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari..." required>
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form>
                        
                            <!-- Tampilkan hasil pencarian jika ada -->
                            @if(isset($results))
                                <h3>Hasil Pencarian untuk "{{ $keyword }}"</h3>
                        
                                @if($results->isEmpty())
                                    <p>Tidak ada hasil yang sesuai dengan kata kunci.</p>
                                @else
                                    @foreach($results as $result)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h2 class="card-title">{{ $result->nama_situs }}</h2>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        
                            <!-- Tambahkan pesan untuk isian kosong atau tidak ditemukan -->
                            <div id="searchMessage"></div>
                        </div>
                        
                        <h1 id="strukturOrganisasi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-right">
                            #Kategori yang anda mau!
                        </h1> 
                        <div class="container mt-5" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="row justify-content-center">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Arsitektur</h2>
                                            <i class="fa-solid fa-archway" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'arsitektur') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>                                                                             
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Bangunan</h2>
                                            <i class="fa-solid fa-building" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'bangunan') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Monumen</h2>
                                            <i class="fa-solid fa-landmark" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'monumen') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Cagar Budaya</h2>
                                            <i class="fa-solid fa-map-location-dot" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'cagar') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Benda</h2>
                                            <i class="fa-solid fa-mortar-pestle" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'benda') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="bg-light card-body text-center">
                                            <h2 class="card-title">Situs Tak Benda</h2>
                                            <i class="fa-solid fa-tag" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('kategori.show', 'nonbenda') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <br>
                        <br>
                        <h1 id="strukturOrganisasi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-right">
                            #Rekomendasi untuk Anda!
                        </h1>
                        <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;" data-aos="fade-left">
                            Halo! Penjelajah sejarah kota tapis berseri, di sini kami berikan rekomendasi sejarah yang mungkin bisa Anda pelajari dan kunjungi.
                        </p>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach($situs->take(3) as $recommendedSitus)
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="aspect-ratio ratio-4x3">
                                            <img src="{{ asset('storage/' . $recommendedSitus->gambar_situs) }}" class="card-img-top" alt="{{ $recommendedSitus->nama_situs }}" style="object-fit: cover;">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $recommendedSitus->nama_situs }}</h5>
                                            <p class="card-text">{{ Str::limit($recommendedSitus->keterangan_situs, 100) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">Terakhir Diperbarui {{ $recommendedSitus->updated_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        
                        <br>
                        <br>
                        <h1 id="promosi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-right">
                            Jadi Kontributor!
                        </h1>
                        <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;" data-aos="fade-left">
                            Dengan menjadi kontributor kamu berkontribusi dalam menyebarkan informasi sejarah dan menjaga sejarah di kota tercinta,
                            dengan beberapa syarat yang perlu kamu lengkapi kamu langsung bisa berkontribusi dalam menambahkan informasi terkait situs sejarah yang kamu ketahui.
                        </p>
                        <div class="card mb-3">
                            <img src="{{ asset('/images/hm1.jpg') }}" class="card-img-top" alt="Jadi Kontributor" style="object-fit: cover; height: 200px;">
                            <div class="bg-warning card-body text-center">
                                <h5 class="card-title">Jadi Kontributor</h5>
                                <p class="card-text">Dengan menjadi kontributor, kamu berkontribusi dalam menyebarkan informasi sejarah dan menjaga sejarah di kota tercinta. Kamu bisa berkontribusi dengan beberapa syarat yang perlu diisi. Ayo ajukan sekarang!</p>
                                <a href="{{ route('formulir') }}" class="btn btn-danger btn-lg rounded-pill px-4 py-2 transition">Ajukan</a>
                            </div>
                        </div>
                        
                        <br>
                        @if(auth()->check())
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2)
                            <h1 id="promosi" class="text-center" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-right">
                                Upload Situs Kamu Disini!
                            </h1>
                            <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;" data-aos="fade-left">
                                Dengan menjadi kontributor, kamu berkontribusi dalam menyebarkan informasi sejarah dan menjaga sejarah di kota tercinta, dengan beberapa syarat yang perlu kamu lengkapi. Kamu langsung bisa berkontribusi dalam menambahkan informasi terkait situs sejarah yang kamu ketahui.
                            </p>
                            <div class="card mb-3">
                                <img src="{{ asset('/images/hm1.jpg') }}" class="card-img-top" alt="Baca Panduan dan Peraturan" style="object-fit: cover; height: 200px;">
                                <div class="bg-warning card-body text-center">
                                    <h5 class="card-title">Baca Panduan dan Peraturan!</h5>
                                    <p class="card-text">Dengan menjadi kontributor, kamu berkontribusi dalam menyebarkan informasi sejarah dan menjaga sejarah di kota tercinta. Kamu bisa berkontribusi dengan beberapa syarat yang perlu diisi. Ayo ajukan sekarang!</p>
                                    <a href="{{ route('uploadsitus.index') }}" class="btn btn-danger btn-lg rounded-pill px-4 py-2 transition">Unggah Situs</a>
                                </div>
                            </div>                            
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

@include('layouts.footer')
@endsection

<style>
    .custom-background {
        min-height: 100vh;
        padding: 20px;
    }
    .carousel-item {
    border-radius: 20px;
    overflow: hidden;
    }
</style>







