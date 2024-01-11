<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontributor;
use Illuminate\Http\Request;

class KontributorListController extends Controller
{
    public function index()
    {
        return view('admin.kontributor.index', [
            'kontributor' => Kontributor::latest()->get()
        ]);
    }

    public function add()
    {
        return view('admin.kontributor.insert');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Kontributor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('admin.kontributor.index')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $kontributor = Kontributor::find($id);

        if (!$kontributor) {
            return redirect()->route('admin.kontributor.index')->with('error', 'Data tidak ditemukan!');
        }

        return view('admin.kontributor.edit', compact('kontributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $kontributor = Kontributor::find($id);

        if (!$kontributor) {
            return redirect()->route('admin.kontributor.index')->with('error', 'Data tidak ditemukan!');
        }

        $kontributor->nama = $request->nama;
        $kontributor->email = $request->email;
        $kontributor->alamat = $request->alamat;
        $kontributor->no_telp = $request->no_telp;
        $kontributor->save();

        return redirect()->route('admin.kontributor.index')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $kontributor = Kontributor::findOrFail($id);
        $kontributor->delete();

        return redirect()->route('admin.kontributor.index')->with('message', 'Data Berhasil Dihapus!');
    }
}
