<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersDataController extends Controller
{
    public function index()
    {
        $dataUser = User::all();
        return view('admin.data-user.index', compact('dataUser'));
    }

    public function edit($id)
    {
        $dataUser = User::find($id);
        return view('admin.data-user.edit', compact('dataUser'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:admin,kepsek,siswa',
        ]);

        // Temukan pengguna berdasarkan ID
        $dataUser = User::find($id);

        if (!$dataUser) {
            return redirect()->route('data-user.index')->with('error', 'User Tidak DItemukan.');
        }

        // Perbarui data pengguna
        $dataUser->name = $validatedData['name'];
        $dataUser->role = $validatedData['role'];
        $dataUser->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('data-user.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataUser = User::find($id);

        if (!$dataUser) {
            return redirect()->route('data-user.index')->with('error', 'User not found.');
        }

        $dataUser->delete();

        return redirect()->route('data-user.index')->with('success', 'Data berhasil dihapus.');
    }
}
