<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Karyawan::factory(10)->create();
        Karyawan::create([
            'nama' => 'John Doe',
            'notelp' => '081234567890',
            'alamat' => 'Jl. Contoh Alamat 123',
            'email' => 'johndoe@example.com',
            'jenis_kelamin' => 'Laki-laki',
        ]);
    }
}
