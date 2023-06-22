<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriterias;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WSMController extends Controller
{
    public function hitung(Request $request)
    {
        $karyawanf = $karyawan = Karyawan::all();
        $inputNilai = $request->input('nilai');
        $karyawanId = $request->input('karyawan');

        // Mengubah tipe data bobot menjadi double
        $bobot = [];
        $kriterias = Kriterias::all();
        foreach ($kriterias as $kriteria) {
            $bobot[$kriteria->id] = (float) $kriteria->n_awal;
        }

        // Hitung total skor untuk karyawan yang dipilih
        $karyawan = Karyawan::findOrFail($karyawanId);
        $skor = 0;
        foreach ($inputNilai as $kriteriaId => $nilai) {
            $skor += $nilai * $bobot[$kriteriaId];
        }
        $karyawan->nilai = $skor;
        $karyawan->save();

        // Lakukan langkah-langkah WSM selanjutnya

        return redirect()->route('karnilai');
    }
    public function reset()
    {
        DB::table('karyawans')->update(['nilai' => null]);

        return redirect()->route('karnilai')->with('success', 'Nilai karyawan berhasil direset');
    }
}
