<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SitusBersejarah;
use Illuminate\Support\Facades\Session;


class UploadSitusController extends Controller
{
    public function index()
    {
        $currentUser = Auth::user();

        $query = SitusBersejarah::query();

        if ($currentUser->role === 2) {
            $query->where('user_id', $currentUser->id);
        }

        $situs = $query->get();

        return view('pages.uploadsitus.index', compact('situs'));
    }

    public function create()
    {
        return view('pages.uploadsitus.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_situs' => 'required|unique:situs_bersejarahs',
                'nama' => 'required|max:255',
                'alamat' => 'required',
                'gambar_situs' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tanggal_berdiri' => 'required|date',
                'pemilik' => 'required',
                'jenis' => 'required',
                'status' => 'required',
                'keterangan_situs' => 'required',
            ]);
            if (empty($request->id_situs) || empty($request->nama) || empty($request->alamat) || empty($request->gambar_situs) || empty($request->tanggal_berdiri) || empty($request->pemilik) || empty($request->jenis) || empty($request->status) || empty($request->keterangan_situs)) {
                throw new \Exception('Form harus diisi lengkap.');
            }

            $gambarPath = $request->file('gambar_situs')->store('images', 'public');

            SitusBersejarah::create([
                'id_situs' => $request->id_situs,
                'gambar_situs' => $gambarPath,
                'nama_situs' => $request->nama,
                'alamat_situs' => $request->alamat,
                'tanggal_berdiri_situs' => $request->tanggal_berdiri,
                'pemilik_situs' => $request->pemilik,
                'jenis_situs' => $request->jenis,
                'status_situs' => $request->status,
                'keterangan_situs' => $request->keterangan_situs,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('uploadsitus.index')->with('success', 'Situs berhasil ditambahkan.');
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'unique:situs_bersejarahs') !== false) {
                return redirect()->back()->with('error', 'ID Situs sudah ada di database.');
            } else {
                return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }
    }

    public function edit($id)
    {
        $situs = SitusBersejarah::findOrFail($id);

        if (Auth::user()->role === 2 && $situs->user_id === Auth::user()->id) {
            return view('pages.uploadsitus.edit', compact('situs'));
        }

        Session::flash('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengedit situs.');

        return redirect()->route('uploadsitus.index');
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'alamat' => 'required',
                'tanggal_berdiri' => 'required|date',
                'pemilik' => 'required',
                'jenis' => 'required',
                'status' => 'required',
            ]);

            $situs = SitusBersejarah::findOrFail($id);

            $this->authorize('update', $situs);

            $situs->update([
                'nama_situs' => $request->nama,
                'alamat_situs' => $request->alamat,
                'tanggal_berdiri_situs' => $request->tanggal_berdiri,
                'pemilik_situs' => $request->pemilik,
                'jenis_situs' => $request->jenis,
                'status_situs' => $request->status,
                'keterangan_situs' => $request->keterangan_situs ?? $situs->keterangan_situs,
                'gambar_situs' => $request->file('gambar_situs')->store('images', 'public'),
            ]);

            return redirect()->route('uploadsitus.index')->with('success', 'Situs berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $situs = SitusBersejarah::findOrFail($id);

        if (Auth::user()->role === 2 && $situs->user_id === Auth::user()->id) {
            $situs->delete();

            return redirect()->route('uploadsitus.index')->with('success', 'Situs berhasil dihapus.');
        }

        Session::flash('error', 'Akses ditolak. Anda tidak memiliki izin untuk menghapus situs.');

        return redirect()->route('uploadsitus.index');
    }

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
}
