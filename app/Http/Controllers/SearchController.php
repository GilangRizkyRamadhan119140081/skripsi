<?php

namespace App\Http\Controllers;

use App\Models\SitusBersejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('pages.ensiklopediaa');
    }

    public function result()
    {
        // $keyword = $request->input('keyword');
        $keyword = $_GET['keyword'];
        // dd($keyword);

        // Lakukan pencarian di database
        // $results = SitusBersejarah::where('nama_situs', 'like', '%' . $keyword . '%')
        //     ->get();

        $results = DB::select("SELECT * FROM situs_bersejarahs WHERE nama_situs LIKE '%$keyword%'");


        // dd($results);

        return view('pages.ensiklopediaa', compact('results', 'keyword'));
    }
}
