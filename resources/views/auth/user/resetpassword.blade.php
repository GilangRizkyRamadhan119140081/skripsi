@extends('layouts.navbar')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full sm:w-96">
        <h2 class="text-2xl font-semibold mb-6">Reset Password</h2>
        <p>Masukan password baru kamu</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" class="form-input w-full" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1">Password Baru</label>
                <input type="password" name="password" id="password" class="w-full rounded border p-2">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1">Konfirmsi Password Baru</label>
                <input type="password" name="password" id="password" class="w-full rounded border p-2">
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
