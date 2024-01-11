<?php

namespace App\Http\Controllers;

use App\Models\kontributor;
use Illuminate\Http\Request;


class KontributorController extends Controller
{
    public function index()
    {
        return view('kontributor.index', [
            'kontributor' => kontributor::latest()->get()
        ]);
    }

    public function add()
    {
        return view('kontributor.insert');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        kontributor::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('kontributor')->with('message', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id)
    {
        $kontributor = kontributor::find($id);

        if (!$kontributor) {
            return redirect()->route('kontributor')->with('error', 'Data tidak ditemukan!');
        }

        return view('kontributor.edit', compact('kontributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $kontributor = kontributor::find($id);

        if (!$kontributor) {
            return redirect()->route('kontributor')->with('error', 'Data tidak ditemukan!');
        }

        $kontributor->nama = $request->nama;
        $kontributor->email = $request->email;
        $kontributor->alamat = $request->alamat;
        $kontributor->no_telp = $request->no_telp;
        $kontributor->save();

        return redirect()->route('kontributor')->with('message', 'Data Berhasil Diperbarui!');
    }
    public function delete($id)
    {
        $kontributor = kontributor::findOrFail($id);
        $kontributor->delete();

        return redirect()->route('kontributor')->with('message', 'Data Berhasil Dihapus!');
    }
}
