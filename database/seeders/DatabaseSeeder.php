<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Membuat 10 data dummy menggunakan model factory
        // User::factory(10)->create();

        // Membuat satu data dummy tambahan dengan properti khusus
        User::create([
            'name' => 'Yana Miftahul H',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
