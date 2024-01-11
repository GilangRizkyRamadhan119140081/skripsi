@extends('layouts.navbar')

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
                            <div class="input-group mb-3">
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari..." onkeydown="if (event.key === 'Enter') performSearch()">
                                <div class="input-group-append">
                                    <button id="searchButton" class="btn btn-danger" type="button" onclick="performSearch()">Cari</button>
                                </div>
                            </div>
                            <!-- Tambahkan pesan untuk isian kosong atau tidak ditemukan -->
                            <div id="searchMessage"></div>
                        </div>
                        
                        <div class="container mt-4" id="searchResults"></div>
                        
                        <script>
                            function createSearchCard(result) {
                                const resultCard = document.createElement('div');
                                resultCard.classList.add('card', 'mb-3');
                        
                                const cardBody = document.createElement('div');
                                cardBody.classList.add('card-body');
                        
                                // Tambahkan tombol "X" untuk menghapus hasil pencarian
                                const closeButton = document.createElement('button');
                                closeButton.classList.add('btn', 'btn-danger', 'float-right');
                                closeButton.innerHTML = '&times;'; // Karakter "X" dalam HTML entity
                                closeButton.addEventListener('click', function () {
                                    resultCard.remove(); // Hapus card saat tombol "X" diklik
                                });
                        
                                const cardTitle = document.createElement('h5');
                                cardTitle.classList.add('card-title');
                                cardTitle.innerText = result.nama_situs;
                        
                                const cardId = document.createElement('p');
                                cardId.classList.add('card-text');
                                cardId.innerText = `ID: ${result.id_situs}`;
                        
                                const cardCategory = document.createElement('p');
                                cardCategory.classList.add('card-text');
                                cardCategory.innerText = `Kategori : ${result.jenis_situs}`;
                        
                                const cardAddress = document.createElement('p');
                                cardAddress.classList.add('card-text');
                                cardAddress.innerText = `Alamat : ${result.alamat_situs}`;
                        
                                const cardDate = document.createElement('p');
                                cardDate.classList.add('card-text');
                                cardDate.innerText = `Tanggal Berdiri : ${result.tanggal_berdiri_situs}`;
                        
                                const cardOwner = document.createElement('p');
                                cardOwner.classList.add('card-text');
                                cardOwner.innerText = `Pemilik : ${result.pemilik_situs}`;
                        
                                const cardDescription = document.createElement('p');
                                cardDescription.classList.add('card-text');
                                cardDescription.innerText = `Keterangan: ${result.keterangan_situs}`;
                        
                                // Perbarui path gambar menggunakan asset helper
                                const imagePath = '{{ asset("storage/") }}/' + result.gambar_situs;
                                const cardImage = document.createElement('img');
                                cardImage.classList.add('card-img-top', 'rounded');
                                cardImage.src = imagePath;
                                cardImage.alt = result.nama_situs;
                        
                                cardBody.appendChild(closeButton); // Tambahkan tombol "X"
                                cardBody.appendChild(cardImage);
                                cardBody.appendChild(cardTitle);
                                cardBody.appendChild(cardId);
                                cardBody.appendChild(cardCategory);
                                cardBody.appendChild(cardAddress);
                                cardBody.appendChild(cardDate);
                                cardBody.appendChild(cardOwner);
                                cardBody.appendChild(cardDescription);
                        
                                resultCard.appendChild(cardBody);
                                return resultCard;
                            }
                        
                            function performSearch() {
                                const keyword = document.getElementById('searchInput').value.toLowerCase();
                                const searchResultsContainer = document.getElementById('searchResults');
                                const searchMessageContainer = document.getElementById('searchMessage');
                                searchResultsContainer.innerHTML = '';
                                searchMessageContainer.innerHTML = '';
                        
                                if (keyword.trim() === '') {
                                    // Tampilkan pesan untuk isian kosong
                                    const emptySearchMessage = document.createElement('p');
                                    emptySearchMessage.innerText = 'Isikan teks untuk mencari yang kamu inginkan.';
                                    searchMessageContainer.appendChild(emptySearchMessage);
                                    return;
                                }
                        
                                const dataFromDatabase = {!! json_encode(\App\Models\SitusBersejarah::all()) !!};
                                const searchResults = dataFromDatabase.filter(result =>
                                    result.id_situs.toLowerCase().includes(keyword) || result.nama_situs.toLowerCase().includes(keyword)
                                );
                        
                                if (searchResults.length === 0) {
                                    // Tampilkan pesan untuk hasil tidak ditemukan
                                    const noResultsMessage = document.createElement('p');
                                    noResultsMessage.innerText = 'Tidak ada hasil yang sesuai dengan kata kunci.';
                                    searchMessageContainer.appendChild(noResultsMessage);
                                } else {
                                    searchResults.forEach(result => {
                                        const resultCard = createSearchCard(result);
                                        searchResultsContainer.appendChild(resultCard);
                                    });
                                }
                            }
                        
                            const searchButton = document.getElementById('searchButton');
                            searchButton.addEventListener('click', performSearch);
                        </script>
                        <h1 id="strukturOrganisasi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-right">
                            #Kategori yang anda mau!
                        </h1> 
                        <div class="container mt-5" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            <div class="row justify-content-center">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h2 class="card-title">Arsitektur</h2>
                                            <i class="fa-solid fa-archway" style="font-size: 10em; display: block; margin: 0 auto;"></i>
                                            <a href="{{ route('guest.kategori.show', 'arsitektur') }}" class="btn btn-danger">
                                                <i class="fa fa-sign-in"></i> Kunjungi Halaman
                                            </a>                                                                                                                                                                                                  
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
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
                                        <div class="card-body text-center">
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
                                        <div class="card-body text-center">
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
                                        <div class="card-body text-center">
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
                                        <div class="card-body text-center">
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
                                        <img src="{{ asset('storage/' . $recommendedSitus->gambar_situs) }}" class="card-img-top" alt="{{ $recommendedSitus->nama_situs }}">
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
                                <a href="{{ route('user.login') }}" class="btn btn-danger">Login</a>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="row justify-content-center">
                                @if(Auth::check())
                                    <div class="col-md-4 text-center" data-aos="fade-up">
                                        <a href="{{ route('formulir') }}" class="btn btn-danger btn-lg btn-block">Ajukan Dokumen</a>
                                    </div>
                                    <div class="col-md-4 text-center" data-aos="fade-up">
                                        <a href="{{ route('formulir') }}" class="btn btn-danger btn-lg btn-block">Kontributor</a>
                                    </div>
                                @endif
                            </div>
                        </div>
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
        background-color: #DBCAB5;
        min-height: 100vh;
        padding: 20px;
    }
    .carousel-item {
    border-radius: 20px;
    overflow: hidden;
    }
</style>







