<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/pages/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function showRegistrationForm()
    {
        return view('auth.user.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = new \App\Models\User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        // Anda dapat mengarahkan pengguna ke halaman login setelah pendaftaran berhasil
        return redirect()->route('user.login')->with('message', 'Pendaftaran berhasil! Silakan login.');
    }

    public function showHomePage()
    {
        return view('pages.home');
    }
}
