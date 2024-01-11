@extends('layouts.navbar')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full sm:w-96">
        <h2 class="text-2xl font-semibold mb-6">Lupa Password</h2>
        <p>Tuliskan email kamu yang terdaftar untuk mendapatkan verifikasi menampilkan password kamu</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" class="form-input w-full" required autofocus>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
        <div>
            @if (session('status'))
                <p class="text-green-600">{{ session('status') }}</p>
            @endif
        </div>
        

    </div>
</div>
@endsection
