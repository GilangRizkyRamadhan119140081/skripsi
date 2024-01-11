<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SitusBersejarah;

class SitusController extends Controller
{
    public function show($id)
    {
        $situs = SitusBersejarah::find($id);

        if (!$situs) {
            return view('errors.situs_not_found');
        }

        return view('pages.detailsitus', compact('situs'));
    }
    public function showGuest($id)
    {
        $situs = SitusBersejarah::find($id);

        if (!$situs) {
            return view('errors.situs_not_found');
        }

        return view('guest.detailsitus', compact('situs'));
    }
}
