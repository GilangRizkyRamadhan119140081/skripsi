<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Logika untuk halaman dashboard pengguna
        return view('user.dashboard');
    }

    // Tambahkan metode lain yang diperlukan untuk halaman dashboard pengguna
}
