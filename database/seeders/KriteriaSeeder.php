<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kriterias;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $kriteria = [
        'Pendidikan',
        'Pengalaman Kerja',
        'Skill',
        'Komunikasi',
        'Kepemimpinan',
        'Inisiatif',
        'Wawancara',
        'Tes Tertulis',
        'Tes Komputer',
        'Jarak/Permintaan Gaji',
    ];

    foreach ($kriteria as $namaKriteria) {
        Kriterias::create([
            'kriteria' => $namaKriteria,
        ]);
    }
}

}
