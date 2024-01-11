@extends('layouts.navbar')
@section('content')
<body style="background-color: #DFBD41;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-4 text-white">
                <div class="mb-4">
                    <h1 class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;" data-aos="fade-up" data-aos-anchor-placement="top-center">
                        Selamat Datang!
                    </h1>
                    <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;" data-aos="fade-up" data-aos-anchor-placement="top-center">
                        Terima kasih telah menggunakan layanan kami.
                        Temukan fitur menarik kami dan nikmati pengalaman terbaik.
                        Silakan login untuk memulai atau jelajahi sebagai tamu.
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
                <div class="text-center mt-4">
                    @auth
                        <a href="{{ route('guest.ensiklopedia') }}" class="text-dark btn btn-danger">Mulai Ekspedisi</a>
                    @else
                        <div class="bg-warning card-body text-center">
                            <h5 class="card-title" style="font-family: 'Roboto', sans-serif; color: #402515; font-weight: bold;">Ingin mengakses Penuh Fitur di Website Kami?</h5>
                            <p class="card-text" style="font-family: 'Roboto', sans-serif; color: #402515;">Dengan login atau mendaftarkan akun, kamu dapat mengakses penuh fitur yang ada dan ikut menjadi bagian yang berkontribusi dalam menyebarkan informasi sejarah dan menjaga sejarah di kota tercinta. Kamu bisa berkontribusi dengan beberapa syarat yang perlu diisi. Ayo daftar dan login sekarang!</p>
                            <a href="{{ route('user.login') }}" class="btn btn-danger">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')
@endsection








