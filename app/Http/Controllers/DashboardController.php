<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Kriterias;
use LengthException;

class DashboardController extends Controller
{
	public function dashboard()
	{
		$totalKaryawan = Karyawan::count();
		$totalKriteria= Kriterias::count();
		$totalNilai= Karyawan::whereNotNull('nilai')->count();
		return view('dashboard.dashboard', compact('totalKaryawan','totalKriteria','totalNilai'));
	}

	public function nilaiview()
	{

		$kriterias = Kriterias::all();
		$karyawan = Karyawan::all();
		$karyawans = Karyawan::whereNotNull('nilai')
		->orderBy('nilai', 'desc')
		->get();

		return view('dashboard.inputnilai', ['karyawan' =>  $karyawan,'karyawanf' =>  $karyawan,'karyawann' =>  $karyawans, 'kriterias' =>  $kriterias]);
	}

	public function karyawanview()
	{
		$karyawan = Karyawan::all();
		$karyawans = Karyawan::paginate(10); // Mengambil data karyawan dengan pagination, 10 karyawan per halaman

		return view('dashboard.inputkaryawan', compact('karyawan', 'karyawans'));
	}

	public function bobotview()
	{
		$kriterias = Kriterias::all();
		$karyawan = Karyawan::all();
		$karyawans = Karyawan::paginate(10); // Mengambil data karyawan dengan pagination, 10 karyawan per halaman
		return view('dashboard.aturbobot', ['karyawan' =>  $karyawan, 'karyawans' =>  $karyawans, 'kriterias' =>  $kriterias, 'kriteriass' =>  $kriterias, 'kriteriab' => $kriterias]);
	}
}
