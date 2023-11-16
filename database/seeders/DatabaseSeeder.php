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
            'email'=>'admin@ukm.com',
            'role'=>'1',
            'password'=>'admin'
        ]);
        User::create([
            'name'=>'fanul',
            'email'=>'fanul@ukm.com',
            'role'=>'0',
            'password'=>'fanul'
        ]);

        Category::create([
            'name' => 'Keagamaan',
            'slug' => 'keagamaan',
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga',
        ]);

        Category::create([
            'name' => 'Akademik',
            'slug' => 'akademik',
        ]);

        Category::create([
            'name' => 'Kesenian',
            'slug' => 'kesenian',
        ]);
    }
}
