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

        User::factory()->create([
            'name' => 'Alan Nascimento',
            'email' => 'alan.desenvolvedor@outlook.com.br',
        ]);

        User::factory()->create([
            'name' => 'Karoline Nascimento',
            'email' => 'karoline@outlook.com.br',
        ]);
    }
}
