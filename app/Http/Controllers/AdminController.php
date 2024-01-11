<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        $admin = new Admin([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $admin->save();

        return redirect()->route('admin.index')->with('message', 'Admin berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'Admin tidak ditemukan!');
        }
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'Admin tidak ditemukan!');
        }

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:8',
            'role' => 'required|integer',
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('message', 'Admin berhasil diperbarui!');
    }
    public function updateRole(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'Admin tidak ditemukan!');
        }

        $request->validate([
            'role' => 'required|integer',
        ]);

        $admin->update(['role' => $request->role]);

        return redirect()->route('admin.index')->with('message', 'Peran admin berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return redirect()->route('admin.index')->with('error', 'Admin tidak ditemukan!');
        }
        $admin->delete();

        return redirect()->route('admin.index')->with('message', 'Admin berhasil dihapus!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        $admin = new Admin([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $admin->save();

        return redirect()->route('admin.login')->with('message', 'Registrasi berhasil! Silakan login.');
    }
}
