<?php

namespace Database\Seeders;

use App\Models\Penerima;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Penerima::create([
            'id' => '1',
            'nama' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => 'superadmin',
            'jabatan' => 'superadmin',
        ]);

        Penerima::create([
            'id' => '2',
            'nama' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => 'petugas',
            'jabatan' => 'petugas_ppid',
        ]);

        Penerima::create([
            'id' => '3',
            'nama' => 'pejabat',
            'email' => 'pejabat@gmail.com',
            'password' => 'pejabat',
            'jabatan' => 'pejabat_ppid',
        ]);
    }
}
