@extends('layouts.navbar')
@section('content')
<body style="background-color: #DFBD41;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mt-4 text-white">
                <div class="mb-4">
                    <h1 class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                        Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung
                    </h1>
                    <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;">Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung di bentuk berdasarkan Peraturan Daerah Kota Bandar Lampung Nomor 07 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandar 
                        Lampung Lampung.Berdasarkan Peraturan Walikota Bandar Lampung Nomor 38 Tahun 2016, telah ditetapkan Tugas, Fungsi, dan Tata Kerja Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung
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
                <h1 id="strukturOrganisasi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                    Struktur Organisasi
                </h1>                
                <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;">
                    Berikut adalah struktur organisasi dinas pedidikan dan kebudayaan khusus di bidang kebudayaan :
                </p>
                <div class="container mt-2 text-center">
                    <img src="{{ asset('/images/pf4.png') }}" class="mx-auto d-block img-fluid" alt="Gambar">
                </div>
                <h1 id="promosi" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                    Bidang Promosi dan Seni Budaya
                </h1>
                <div class="container mt-2 text-center">
                    <img src="{{ asset('/images/hm1.jpg') }}" class="mx-auto d-block img-fluid" alt="Gambar">
                </div>
                <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;">
                    Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung di bentuk berdasarkan Peraturan Daerah Kota Bandar Lampung Nomor 07 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandar Lampung Lampung. Berdasarkan Peraturan Walikota Bandar Lampung Nomor 38 Tahun 2016, telah ditetapkan Tugas, Fungsi, dan Tata Kerja Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung.
                </p>
                <h1 id="pembinaan" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                    Bidang Pembinaan Seni dan Budaya
                </h1>
                <div class="container mt-2 text-center">
                    <img src="{{ asset('/images/hm1.jpg') }}" class="mx-auto d-block img-fluid" alt="Gambar">
                </div>
                <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;">
                    Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung di bentuk berdasarkan Peraturan Daerah Kota Bandar Lampung Nomor 07 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandar Lampung Lampung. Berdasarkan Peraturan Walikota Bandar Lampung Nomor 38 Tahun 2016, telah ditetapkan Tugas, Fungsi, dan Tata Kerja Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung.
                </p>
                <h1 id="pelestarian" class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515; font-size: 58px; font-weight: bold;">
                    Bidang  Pelestarian & Pengembangan Budaya
                </h1>
                <div class="container mt-2 text-center">
                    <img src="{{ asset('/images/hm1.jpg') }}" class="mx-auto d-block img-fluid" alt="Gambar">
                </div>
                <p class="text-justify" style="font-family: 'Roboto', sans-serif; color: #402515;">
                    Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung di bentuk berdasarkan Peraturan Daerah Kota Bandar Lampung Nomor 07 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Bandar Lampung Lampung. Berdasarkan Peraturan Walikota Bandar Lampung Nomor 38 Tahun 2016, telah ditetapkan Tugas, Fungsi, dan Tata Kerja Dinas Pendidikan dan Kebudayaan Kota Bandar Lampung.
                </p>
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







