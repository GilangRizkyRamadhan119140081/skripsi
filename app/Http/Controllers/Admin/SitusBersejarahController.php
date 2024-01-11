<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SitusBersejarah;
use Illuminate\Support\Str;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use League\Csv\Writer;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;


class SitusBersejarahController extends Controller
{
    public function index()
    {

        // Mendapatkan user saat ini
        $currentUser = Auth::user();

        // Inisialisasi query builder
        $query = SitusBersejarah::query();

        // Mengecek role user saat ini
        if ($currentUser && $currentUser->role === 2) { // Ganti dengan nilai role untuk kontributor
            // Jika user adalah kontributor, hanya tampilkan data yang dia upload
            $query->where('user_id', $currentUser->id);
        }

        // Mengambil data dari query
        $situs = $query->get();

        return view('admin.situs_bersejarah.index', compact('situs'));
    }


    public function create()
    {
        return view('admin.situs_bersejarah.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'alamat' => 'required',
                'gambar_situs' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_berdiri' => 'required|date',
                'pemilik' => 'required',
                'jenis' => 'required',
                'status' => 'required',
                'keterangan_situs' => 'required',
            ]);

            $gambarPath = $request->file('gambar_situs')->store('images', 'public');

            $currentUser = Auth::user();

            $data = [
                // 'id_situs' => $request->id_situs,
                'gambar_situs' => $gambarPath,
                'nama_situs' => $request->nama,
                'alamat_situs' => $request->alamat,
                'tanggal_berdiri_situs' => $request->tanggal_berdiri,
                'pemilik_situs' => $request->pemilik,
                'jenis_situs' => $request->jenis,
                'status_situs' => $request->status,
                'keterangan_situs' => $request->keterangan_situs,
                'user_id' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];

            // dd($data);


            DB::table('situs_bersejarahs')->insert($data);

            // SitusBersejarah::create();

            return redirect()->route('situs.index')->with('success', 'Situs berhasil ditambahkan.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    public function edit($id_situs)
    {
        $situs = SitusBersejarah::findOrFail($id_situs);
        return view('admin.situs_bersejarah.edit', compact('situs'));
    }

    public function update(Request $request, $id_situs)
    {
        try {
            $request->validate([
                'id_situs' => 'required',
                // ...
                'status' => 'required',
            ]);

            $situs = SitusBersejarah::findOrFail($id_situs);

            $situs->nama_situs = $request->nama;
            $situs->alamat_situs = $request->alamat;
            $situs->tanggal_berdiri_situs = $request->tanggal_berdiri;
            $situs->pemilik_situs = $request->pemilik;
            $situs->jenis_situs = $request->jenis;
            $situs->status_situs = $request->status;

            if ($request->has('keterangan_situs')) {
                $situs->keterangan_situs = $request->keterangan_situs;
            }

            if ($request->hasFile('gambar_situs')) {
                $gambarPath = $request->file('gambar_situs')->store('images', 'public');
                $situs->gambar_situs = $gambarPath;
            } else {
                $situs->gambar_situs = $situs->gambar_situs;
            }

            $situs->user_id = auth()->id();

            $situs->save();

            return redirect()->route('situs.index')->with('success', 'Situs berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function destroy($id_situs)
    {
        $situs = SitusBersejarah::findOrFail($id_situs);
        $situs->delete();

        return redirect()->route('situs.index')->with('success', 'Situs berhasil dihapus.');
    }
    public function showDetailSitus($id)
    {
        $situs = SitusBersejarah::find($id);
        $komentars = Komentar::where('page_id', $id)->get();

        return view('admin.situs_bersejarah.detail', compact('situs', 'komentars'));
    }
    public function download($format)
    {
        $situs = SitusBersejarah::all();

        if ($format === 'csv') {
            $csv = Writer::createFromString('');
            $csv->insertOne(['ID Situs', 'Nama Situs', 'Alamat Situs', 'Tanggal Berdiri', 'Pemilik', 'Jenis', 'Status', 'Keterangan']);

            foreach ($situs as $item) {
                $csv->insertOne([
                    $item->id_situs,
                    $item->nama_situs,
                    $item->alamat_situs,
                    $item->tanggal_berdiri_situs,
                    $item->pemilik_situs,
                    $item->jenis_situs,
                    $item->status_situs,
                    $item->keterangan_situs,
                ]);
            }

            $filename = 'data_situs.csv';

            return Response::stream(
                function () use ($csv) {
                    $csv->output();
                },
                200,
                [
                    'Content-Type' => 'text/csv',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                ]
            );
        } elseif ($format === 'pdf') {
        }
        return redirect()->route('situs.index')->with('error', 'Format unduhan tidak valid.');
    }
    public function show($id)
    {
        $situs = SitusBersejarah::findOrFail($id);
        return view('admin.situs_bersejarah.show', compact('situs'));
    }

    public function dokumenPdf()
    {
        $situs = SitusBersejarah::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.situs_bersejarah.dokumen', ['data' => $situs]);

        // Return the PDF as a download response
        return $pdf->download('Dokumen Situs.pdf');
    }
}
