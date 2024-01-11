<?php

namespace App\Http\Controllers;

use App\Models\SitusBersejarah;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function show($kategori)
    {
        $items = SitusBersejarah::where('jenis_situs', $kategori)->get();
        return view('pages.kategori', compact('items'));
    }
    public function showGuest($kategori)
    {
        $items = SitusBersejarah::where('jenis_situs', $kategori)->get();
        return view('guest.kategori', compact('items'));
    }
}
