<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function tambah(Request $request){
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'notelp' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|string',
        ]);

        // Simpan data karyawan ke dalam database
        Karyawan::create($validatedData);

        // Redirect ke halaman yang sesuai
        return redirect()->back()->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'notelp' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'jenis_kelamin' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nama = $request->nama;
        $karyawan->notelp = $request->notelp;
        $karyawan->alamat = $request->alamat;
        $karyawan->email = $request->email;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->save();

        return redirect()->route('karinput')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function hapus($id){
    try {
        // Find the karyawan by ID
        $karyawan = Karyawan::findOrFail($id);

        // Delete the karyawan
        $karyawan->delete();

        return redirect()->back()->with('success', 'Karyawan has been deleted successfully.');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete karyawan.');
        }
    }
}
