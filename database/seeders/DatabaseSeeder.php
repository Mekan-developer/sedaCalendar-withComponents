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
  
        User::factory()->create([
            'name' => 'super-admin',
            'email' => 'admin@admin.com',
            'is_admin' => 1
        ]);
        
    }
}
