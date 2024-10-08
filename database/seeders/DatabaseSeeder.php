<?php

namespace Database\Seeders;

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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'Anang Bima Perdana',
            'email'     => 'anangbima11@gmail.com',
            'username'  => 'anangbima',
            'password'  => '12345678',
            'role'      => 'user',
            'status'    => 'verify'
        ]);

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'username'  => 'admin',
            'password'  => 'admin',
            'role'      => 'admin',
            'status'    => 'verify'
        ]);

        User::create([
            'name'      => 'Verifikator',
            'email'     => 'verifikator@gmail.com',
            'username'  => 'verifikator',
            'password'  => 'verifikator',
            'role'      => 'verifikator',
            'status'    => 'verify'
        ]);
    }
}
