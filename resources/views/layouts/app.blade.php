<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/2f5323979c.js" crossorigin="anonymous"></script>
    

    <style>
        .navbar-nav.mx-auto li.nav-item {
            margin-right: 15px;
        }

        .navbar-nav.mx-auto li.nav-item a.nav-link {
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bold;
            transition: all 4s;
            color: #333;
        }

        .navbar-nav.mx-auto li.nav-item a.nav-link:hover {
            color: #2421e0;
        }

        .navbar-custom {
            background-color: #DFBD41 !important;
        }
        .navbar-nav .nav-link .user-profile {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link .user-profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 8px;
        }
        .avatar-initials {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            background-color: #f0f0f0;
            color: #333;
            border-radius: 50%;
        }
        .navbar-nav.ml-auto li.nav-item {
            margin-right: 15px;
        }

        .navbar-nav.ml-auto li.nav-item a.nav-link {
            border: 1px solid;
            padding: 2px 8px;
            border-radius: 5px;
            transition: all 0.3s;

        }

        .navbar-nav.ml-auto li.nav-item a.nav-link:hover {
            border: 2px solid #DFBD41;
            background-color: #DFBD41;
            color: #fff;
        }
        .navbar-nav.ml-auto li.nav-item a.nav-link {
            border: 1px solid transparent;
            padding: 2px 8px;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight:inherit;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

        }

        .navbar-nav.ml-auto li.nav-item a.nav-link:hover {
            border: 2px solid #DFBD41;
            background-color: #DFBD41;
            color: #fff;
            font-weight: bold;
        }
        .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        }

    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        {{-- <a class="navbar-brand" href="{{ route('pages.home') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" style="width: 60px;">
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('pages.home') }}">
                        <img src="{{ asset('/images/logo.png') }}" alt="Logo" style="width: 40px;">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('profil') }}" id="profilDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profilDropdown">
                        <a class="dropdown-item" href="{{ route('profil') }}">Dinas Pendidikan dan Kebudayaan</a>
                        <a class="dropdown-item" href="{{ route('profil') }}#strukturOrganisasi">Struktur Organisasi</a>
                        <a class="dropdown-item" href="{{ route('profil') }}#promosi">Bidang Promosi Seni dan Budaya</a>
                        <a class="dropdown-item" href="{{ route('profil') }}#pembinaan">Bidang Pembinaan Seni dan Budaya</a>
                        <a class="dropdown-item" href="{{ route('profil') }}#pelestarian">Bidang Pelestarian & Pengembangan Budaya</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.informasi') }}">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.ensiklopedia') }}">Ensiklopedia</a>
                </li>
                @if(auth()->check())
                    @if(auth()->user()->role == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.data') }}">Data Arsip</a>
                        </li>
                    @endif
                @endif
                @if(auth()->check())
                    @if(auth()->user()->role == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logindash') }}">Admin</a>
                        </li>
                    @endif
                @endif
                @if(auth()->check())
                    @if(auth()->user()->role == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.repository') }}">Repository</a>
                        </li>
                    @endif
                @endif
            </ul>
            <ul class="navbar-nav ml-auto d-flex flex-column align-items-center">
                @auth
                <li class="nav-item user-info">
                    <div class="avatar-initials">
                        <span>{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                    <span>{{ auth()->user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link btn btn-danger">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                </li>
                <li class="nav-item" style="margin-top: 2px">
                    <a class="nav-link" href="{{ route('register') }}">Registrasi</a>
                </li>
                @endauth
            </ul>
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        AOS.init();
    </script>
    
</body>
</html>
