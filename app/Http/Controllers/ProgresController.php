<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Formulir;

class ProgresController extends Controller
{
    public function index()
    {
        $userEmail = Auth::user()->email;

        $formulirs = Formulir::where('email', $userEmail)->get();

        return view('pages.progres', compact('formulirs'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
