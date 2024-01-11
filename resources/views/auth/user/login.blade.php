@extends('layouts.navbar')

@section('content')

<style>
    .btn-color{
    background-color: #0e1c36;
    color: #fff;
    }

    .profile-image-pic{
    height: 200px;
    width: 200px;
    object-fit: cover;
    }

    .cardbody-color{
    background-color: #DFBD41;
    }

    a{
    text-decoration: none;
    }
</style>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Form Login</h2>
        <div class="text-center mb-5 text-dark">Isikan dengan Benar!</div>
        <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('user.login') }}">
            @csrf
            <div class="text-center">
                <img src="/images/lg.jpeg" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
            </div>

            <div class="mb-3">
                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="email" required autofocus>
            </div>

            <div class="mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <div class="mb-4">
                <input type="checkbox" id="remember" name="remember" class="mr-2">
                <label for="remember">Remember me</label>
            </div>

            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                Registered? <a href="{{ route('register') }}" class="text-dark fw-bold"> Create an Account</a>
            </div>
        </form>

        @if(session('message'))
            <div id="notification" class="fixed top-0 right-0 m-4 p-4 bg-green-200 border border-green-400 text-green-700 rounded">
                <p id="notification-text">{{ session('message') }}</p>
            </div>
            <script>
                // Tampilkan pesan pop-up
                var notification = document.getElementById('notification');
                var notificationText = document.getElementById('notification-text');

                notificationText.innerHTML = "{{ session('message') }}";
                notification.style.display = 'block';

                // Sembunyikan pesan setelah beberapa detik (misalnya, 5 detik)
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 5000); // Ubah angka ini sesuai kebutuhan
            </script>
        @endif
    </div>
</div>
@endsection
