<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Employer;
use App\Models\JobApplication;
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
        // Career::factory()->count(20)->create();
        // Employer::factory()->count(20)->create();
        JobApplication::factory()->count(20)->create();
    }
}

