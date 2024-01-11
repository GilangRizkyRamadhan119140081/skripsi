<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SitusBersejarah;
use App\Models\Formulir;
use Illuminate\Support\Str;
use League\Csv\Writer;
use Barryvdh\DomPDF\Facade as PDF;

class DataController extends Controller
{
    public function index()
    {
        $data = SitusBersejarah::all();
        $formulirs = Formulir::all();

        return view('pages.data', compact('data', 'formulirs'));
    }

    public function download()
    {
        $data = SitusBersejarah::all();

        if ($data->isEmpty()) {
            return redirect()->route('pages.data')->with('error', 'Tidak ada data yang tersedia untuk diunduh.');
        }

        $csv = Writer::createFromString('');
        $csv->insertOne(['ID Situs', 'Nama Situs', 'Alamat Situs', 'Tanggal Berdiri', 'Pemilik', 'Jenis', 'Status', 'Keterangan']);

        foreach ($data as $item) {
            $csv->insertOne([
                $item->id_situs,
                $item->nama_situs,
                $item->alamat_situs,
                $item->tanggal_berdiri_situs,
                $item->pemilik_situs,
                $item->jenis,
                $item->status_situs,
                $item->keterangan_situs,
            ]);
        }

        $filename = 'data_situs.csv';
        $csv->output($filename);

        return response()->stream(
            function () use ($csv) {
                $csv->output();
            },
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }
    // public function downloadPDF()
    // {
    //     $data = SitusBersejarah::all();
    //     $pdf = PDF::loadView('pages.pdf', compact('data'));

    //     $filename = 'data_situs.pdf';
    //     return $pdf->download($filename);
    // }
}
