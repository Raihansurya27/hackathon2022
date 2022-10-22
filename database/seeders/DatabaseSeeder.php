<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tipe;
use App\Models\Peran;
use App\Models\Jabatan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        Jabatan::create([
            'nama' => 'Chef',
        ]);

        Jabatan::create([
            'nama' => 'Pramusaji',
        ]);

        Peran::create([
            'nama' => 'Admin',
        ]);

        Peran::create([
            'nama' => 'Customer',
        ]);

        Tipe::create([
            'nama' => 'Makanan Pembuka',
        ]);

        Tipe::create([
            'nama' => 'Makanan Penutup',
        ]);

        Tipe::create([
            'nama' => 'Makanan Utama',
        ]);
        Tipe::create([
            'nama' => 'Minuman',
        ]);
    }


}
