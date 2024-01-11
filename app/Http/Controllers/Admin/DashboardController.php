<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontributor;
use App\Models\Moderator;
use App\Models\SitusBersejarah;
use App\Models\User;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $jumlahKontributor = Kontributor::count();
            $jumlahModerator = Moderator::count();
            $jumlahSitusBersejarah = SitusBersejarah::count();
            $jumlahUser = User::count();
            $jumlahInformasi = Informasi::count();
            return view('admin.dashboard', compact('user', 'jumlahKontributor', 'jumlahModerator', 'jumlahSitusBersejarah', 'jumlahUser', 'jumlahInformasi', 'user'));
        }
        return redirect()->route('admin.login');
    }
}
