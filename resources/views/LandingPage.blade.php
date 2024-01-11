@extends('layouts.navbar')

@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-custom">
    </nav>
@endsection

@section('content')

<body style="background-color: #DFBD41;">
    <div class="container text-center py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 text-white">
                    <div class="mb-4">
                        <h1 class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            Selamat Datang!
                        </h1>
                        
                        <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;" data-aos="fade-up" data-aos-anchor-placement="top-center">
                            Website Resmi Dinas Kebudayaan Kota Bandar Lampung. Dapatkan informasi terbaru seputar kebudayaan dan situs bersejarah di sini. Anda juga bisa menemukan informasi berkaitan situs bersejarah.
                        </p>
                    </div>
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-aos="fade-up" data-aos-anchor-placement="top-center">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('/images/hm1.jpg') }}" alt="Gambar 1" style="width:100%; height: 400px; object-fit: cover; border-radius: 20px;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/images/hm2.jpeg') }}" alt="Gambar 2" style="width:100%; height: 400px; object-fit: cover; border-radius: 20px;">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/images/hm3.jpg') }}" alt="Gambar 3" style="width:100%; height: 400px; object-fit: cover; border-radius: 20px;">
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
                    <br>
                    <div class="bg-yellow-400 py-8">
                        <div class="container mx-auto">
                            <div class="text-center">
                                <h2 class="text-2xl font-semibold text-gray-800" style="font-family: 'Roboto', sans-serif; color: #402515;">Siap untuk Memulai?</h2>
                                <p class="mt-2 text-lg text-gray-600" style="font-family: 'Roboto', sans-serif; color: #402515;">Ayo mulai jelajahi website ini dengan mengaksesnya secara mudah dibawah ini!</p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        @auth
                            <a href="{{ route('user.home') }}" class="btn btn-danger">Mulai Ekspedisi</a>
                        @else
                            <a href="{{ route('user.login') }}" class="btn btn-danger">Login</a>
                            <a href="{{ route('guest.home') }}" class="btn btn-secondary">Guest</a>
                        @endauth
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')
@endsection