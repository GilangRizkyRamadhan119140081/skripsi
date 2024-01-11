<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use Illuminate\Support\Facades\DB;

class AdminProgresController extends Controller
{
    public function index()
    {
        $formulirs = Formulir::all();
        return view('admin.progres.index', compact('formulirs'));
    }

    public function edit($id)
    {
        $formulir = Formulir::findOrFail($id);
        return view('admin.progres.edit', compact('formulir'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->file('download')->getClientOriginalName());

        $request->validate([
            'instansi' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'jenis_keperluan' => 'required',
            'keterangan' => 'required',
            'download' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $downloadPath = $request->file('download')->getClientOriginalName() ? $request->file('download')->storeAs('download', 'download.pdf', 'public') : null;

        // dd($downloadPath);
        $data = [
            'instansi' => $request->instansi,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'jenis_keperluan' => $request->jenis_keperluan,
            'keterangan' => $request->keterangan,
            'status' => 'Diproses',
        ];



        if ($downloadPath != null) {
            $data2 = [
                'download' => $downloadPath
            ];
        } else {
            $data2 = [];
        }

        $final = array_merge($data, $data2);

        // dd($final);

        // $formulir = Formulir::findOrFail($id);
        // $formulir->update($final);

        DB::table('formulirs')
            ->where('id', $id)
            ->update($final);

        return redirect()->route('admin.progres.index')->with('success', 'Formulir berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $formulir = Formulir::findOrFail($id);
        $formulir->delete();

        return redirect()->route('admin.progres.index')->with('success', 'Formulir berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'status' => 'required|in:Diajukan,Diproses,Ditolak,Diterima',
        ]);

        // Find the Formulir by ID
        $formulir = Formulir::findOrFail($id);

        // Update the status


        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Formulir updated successfully');
    }


    public function download($id)
    {
        $formulir = Formulir::findOrFail($id);
    }
    // AdminProgresController.php

    public function reject($id)
    {
        // Logika penolakan progres berdasarkan $id
        // ...

        return redirect()->route('admin.progres.index')->with('status', 'Progres ditolak.');
    }
    public function preview($id)
    {
        try {
            // Temukan formulir berdasarkan ID
            $formulir = Formulir::findOrFail($id);

            // Logika untuk menampilkan pratinjau formulir
            return view('admin.progres.preview', compact('formulir'));
        } catch (\Exception $e) {
            // Tangani jika formulir tidak ditemukan
            return redirect()->route('admin.progres.index')->with('error', 'Formulir tidak ditemukan.');
        }
    }
    public function laporanPdf()
    {
        $formulir = Formulir::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.progres.download', ['data' => $formulir]);
        return $pdf->download('Laporan Arsip.pdf');
    }
}
