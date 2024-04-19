<?php

namespace Database\Seeders;

use App\Models\Project;
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
            'uid' => 1,
            'username' => 'Admin',
            'email' => 'test@example.com',
            'password'=> bcrypt('laravelisfun'),
        ]);
        
        Project::factory(100)->create();
    }
}
