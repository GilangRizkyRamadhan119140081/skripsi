<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\Moderator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeratorListController extends Controller
{
    public function index()
    {
        return view('admin.moderator.index', [
            'moderators' => Moderator::latest()->get()
        ]);
    }

    public function add()
    {
        return view('admin.moderator.insert');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Moderator::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);


        return redirect()->route('admin.moderator')->with('message', 'Data Berhasil Ditambahkan!');
    }


    public function edit($id)
    {
        $moderator = Moderator::find($id);

        if (!$moderator) {
            return redirect()->route('admin.moderator.index')->with('error', 'Data tidak ditemukan!');
        }

        return view('admin.moderator.edit', compact('moderator'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $moderator = Moderator::find($id);

        if (!$moderator) {
            return redirect()->route('admin.moderator')->with('error', 'Data tidak ditemukan!');
        }

        $moderator->nama = $request->nama;
        $moderator->email = $request->email;
        $moderator->nama = $request->alamat;
        $moderator->email = $request->no_telp;
        $moderator->save();

        return redirect()->route('admin.moderator')->with('message', 'Data Berhasil Diperbarui!');
    }

    public function delete($id)
    {
        $moderator = Moderator::findOrFail($id);
        $moderator->delete();

        return redirect()->route('admin.moderator')->with('message', 'Data Berhasil Dihapus!');
    }
}
