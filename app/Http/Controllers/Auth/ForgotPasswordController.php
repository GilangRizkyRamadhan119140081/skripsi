<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    public function showlupapasswordForm()
    {
        // Tampilkan formulir lupa kata sandi
        return view('auth.user.lupapassword'); // Pastikan lokasi view sesuai
    }

    protected function sendResetLink(Request $request)
    {
        $this->validateEmail($request);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
