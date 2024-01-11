<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;
use Illuminate\Support\Str;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_informasi' => 'required|unique:informasis',
                'judul_informasi' => 'required|max:255',
                'alamat_informasi' => 'required',
                'gambar_informasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_informasi' => 'required|date',
                'pemilik_informasi' => 'required',
                'keterangan_informasi' => 'required',
            ]);

            $gambarPath = $request->file('gambar_informasi')->store('images', 'public');

            Informasi::create([
                'id_informasi' => $request->id_informasi,
                'judul_informasi' => $request->judul_informasi,
                'alamat_informasi' => $request->alamat_informasi,
                'gambar_informasi' => $gambarPath,
                'tanggal_informasi' => $request->tanggal_informasi,
                'pemilik_informasi' => $request->pemilik_informasi,
                'keterangan_informasi' => $request->keterangan_informasi,
            ]);

            return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function edit($id_informasi)
    {
        $informasi = Informasi::findOrFail($id_informasi);
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id_informasi)
    {
        try {
            $request->validate([
                'judul_informasi' => 'required|max:255',
                'alamat_informasi' => 'required',
                'gambar_informasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_informasi' => 'required|date',
                'pemilik_informasi' => 'required',
                'keterangan_informasi' => 'required',
            ]);

            $informasi = Informasi::findOrFail($id_informasi);
            $informasi->judul_informasi = $request->judul_informasi;
            $informasi->alamat_informasi = $request->alamat_informasi;
            $informasi->tanggal_informasi = $request->tanggal_informasi;
            $informasi->pemilik_informasi = $request->pemilik_informasi;

            if ($request->has('keterangan_informasi')) {
                $informasi->keterangan_informasi = $request->keterangan_informasi;
            }

            if ($request->hasFile('gambar_informasi')) {
                $gambarPath = $request->file('gambar_informasi')->store('public/gambar');
                $informasi->gambar_informasi = $gambarPath;
            }

            $informasi->save();

            return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function destroy($id_informasi)
    {
        $informasi = Informasi::findOrFail($id_informasi);
        $informasi->delete();

        return redirect()->route('informasi.index')->with('success', 'informasi berhasil dihapus.');
    }
    public function informasiPage()
    {
        $informasi = Informasi::all(); // Ambil semua data informasi

        return view('pages.informasi', ['informasi' => $informasi]);
    }
}
