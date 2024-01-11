<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulir;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FormulirController extends Controller
{
    public function index()
    {
        return view('pages.formulir.index');
    }

    public function create()
    {
        return view('pages.formulir.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'instansi' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'nomor_hp' => 'required',
                'jenis_keperluan' => 'required',
                'keterangan' => 'required',
                'surat_perizinan' => 'required|mimes:pdf,doc,docx|max:2048',
                'gambar' => 'required|image|max:2048',
                'status' => 'Diajukan',
                'download' => 'nullable|mimes:pdf,doc,docx|max:2048',
            ]);

            $user = Auth::user();
            $suratPerizinanPath = $request->file('surat_perizinan')->storeAs('surat_perizinan', 'nama_file_surat_perizinan.pdf', 'public');
            // dd($user->id);
            $gambarPath = $request->file('gambar')->storeAs('images', $request->file('gambar')->getClientOriginalName(), 'public');
            $downloadPath = $request->hasFile('download') ? $request->file('download')->storeAs('download', 'download.pdf', 'public') : null;

            // dd($downloadPath);

            $data = [
                'user_id' => $user->id,
                'nama' => $request->nama,
                'instansi' => $request->instansi,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'jenis_keperluan' => $request->jenis_keperluan,
                'keterangan' => $request->keterangan,
                'surat_perizinan' => $suratPerizinanPath,
                'gambar' => $gambarPath,
                'status' => 'Diajukan',
            ];

            if ($downloadPath != null) {
                $downloadPath = $data['download'];
            }

            $formulir = DB::table('formulirs')->insert($data);

            return redirect()->route('pages.progres')->with('success', 'Formulir berhasil dikirim. ID Formulir: ');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $formulir = Formulir::findOrFail($id);
        return view('pages.formulir.edit', compact('formulir'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'instansi' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'nomor_hp' => 'required',
                'jenis_keperluan' => 'required',
                'keterangan' => 'required',
                'surat_perizinan' => 'nullable|mimes:pdf,doc,docx|max:2048',
                'gambar' => 'nullable|image|max:2048',
                'status' => 'nullable',
                'download' => 'nullable|mimes:pdf,doc,docx|max:2048',
            ]);

            $formulir = Formulir::findOrFail($id);
            $formulir->update([
                'nama' => $request->nama,
                'instansi' => $request->instansi,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor_hp' => $request->nomor_hp,
                'jenis_keperluan' => $request->jenis_keperluan,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
            ]);

            if ($request->hasFile('surat_perizinan')) {
                Storage::delete($formulir->surat_perizinan);
                $suratPerizinanPath = $request->file('surat_perizinan')->storeAs('surat_perizinan', 'nama_file_surat_perizinan.pdf', 'public');
                $formulir->update(['surat_perizinan' => $suratPerizinanPath]);
            }

            if ($request->hasFile('gambar')) {
                Storage::delete($formulir->gambar);
                $gambarPath = $request->file('gambar')->storeAs('images', $request->file('gambar')->getClientOriginalName(), 'public');
                $formulir->update(['gambar' => $gambarPath]);
            }

            $downloadPath = $formulir->download;

            if ($request->hasFile('download')) {
                Storage::delete($formulir->download);
                $downloadPath = $request->file('download')->storeAs('download', 'public');
            }

            $formulir->update([
                'download' => $downloadPath,
            ]);

            return redirect()->route('admin.progres.index')->with('success', 'Formulir berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin.progres.edit', $id)->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user(); // Mendapatkan user yang sedang terautentikasi
            $formulir = $user->Formulir->findOrFail($id);

            // Hapus file-file terkait jika diperlukan
            Storage::delete([$formulir->surat_perizinan, $formulir->gambar, $formulir->download]);

            $formulir->delete();

            return redirect()->route('admin.progres.index')->with('success', 'Formulir berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.progres.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
