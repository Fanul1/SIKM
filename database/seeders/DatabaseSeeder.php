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
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@usk.ac.id',
            'role'=>'1',
            'password'=>bcrypt('admin')
        ]);
        User::create([
            'name'=>'user',
            'email'=>'user@usk.ac.id',
            'role'=>'0',
            'password'=>bcrypt('user')
        ]);
    }
}
