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
            <h2 class="text-center text-dark mt-5">Form Registrasi</h2>
            <div class="text-center mb-5 text-dark">Isikan dengan Benar!</div>
            <div class="card my-5">
                @if (session('message'))
                    <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">
                        {{ session('message') }}
                    </div>
                @endif

                <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('user.register') }}">
                    @csrf

                    <div class="mb-4">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        @error('password')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-black rounded px-4 py-2">Daftarkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('status'))
<script>
    alert("{{ session('status') }}");
</script>
@endif
@endsection
