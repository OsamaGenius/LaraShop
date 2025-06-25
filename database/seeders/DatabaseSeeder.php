<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'System',
            'username' => 'sys',
            'email' => 'larashop@gmail.com',
            'password' => Hash::make('Admin@10'),
            'group_id' => 1,
            'approvent' => 1,
        ]);

    }
}
