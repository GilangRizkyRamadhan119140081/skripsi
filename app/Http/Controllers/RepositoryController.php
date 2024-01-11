<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SitusBersejarah;
use App\Models\Komentar;

class RepositoryController extends Controller
{
    public function show()
    {
        $situs = SitusBersejarah::all();

        if (!$situs) {
            return view('errors.situs_not_found');
        }

        return view('pages.repository', compact('situs'));
    }
    public function showdetail($id)
    {
        $situs = SitusBersejarah::find($id);

        $komentar = Komentar::where('situs_id', $situs->id_situs)->get();

        if (!$situs) {
            return view('errors.situs_not_found');
        }

        return view('pages.detailsitus', compact('situs', 'komentar'));
    }
    public function showGuest($id)
    {
        $situs = SitusBersejarah::find($id);

        if (!$situs) {
            return view('errors.situs_not_found');
        }

        return view('guest.repository', compact('situs'));
    }
}
