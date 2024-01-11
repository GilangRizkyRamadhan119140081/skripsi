<?php

namespace App\Http\Controllers;

use App\Models\SitusBersejarah;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function show($id)
    {
        $situs = SitusBersejarah::findOrFail($id);

        $komentars = Komentar::where('id_situs', $situs->id_situs)->get();

        return view('pages.detailsitus', compact('situs', 'komentars'));
    }
    public function store(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'id_situs' => 'required|exists:situs,id_situs',
        //     'nama' => 'required|string',
        //     'komentar' => 'required|string',
        // ]);

        // Komentar::create($validatedData);

        $situs = SitusBersejarah::where('id_situs', $id)->first();

        $komentar = new Komentar;
        $komentar->message = $request->message;
        $komentar->situs_id = $id;
        $komentar->user_id = Auth::user()->id;
        $komentar->nama = $request->nama;
        $komentar->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
