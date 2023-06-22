<?php

namespace App\Http\Controllers;

use App\Models\Kriterias;
use Illuminate\Http\Request;

class AHPController extends Controller
{
    public function tambah(Request $request)
    {
        $validatedData = $request->validate([
            'kriteria' => 'required|string'
        ]);

        Kriterias::create($validatedData);
        return redirect()->back()->with('success', 'Data kriteria berhasil ditambahkan');
    }
    public function hapus(Request $request)
    {
        $id = $request->input('kriteria');

        $kriteria = Kriterias::find($id);

        $kriteria->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
    public function sendData(Request $request)
	{
		$bobot = $request->data;
		$kriterias = Kriterias::all();

		$array = [];
		
		foreach ($kriterias as $key => $value ) {

			Kriterias::where('id', $value->id)
			->update([
				'n_awal' => $bobot[$key],
			
			]);

		}
	
		
	}
}
