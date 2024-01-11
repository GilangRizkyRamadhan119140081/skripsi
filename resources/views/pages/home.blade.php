@extends('layouts.app')

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
                    <div style="background-color: #DBCAB5;" class="card">
                        <div class="card-header">
                            Quote
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>A well-known quote, contained in a blockquote element.</p>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4 mb-5">
                        @auth
                            <a href="{{ route('pages.ensiklopedia') }}" class="text-default btn btn-danger" style="font-weight: bold;">Mulai Temukan</a>
                        @else
                            <a href="{{ route('user.login') }}" class="btn btn-danger">Login</a>
                            <a href="{{ route('landing.page') }}" class="btn btn-secondary">Guest</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')
@endsection
