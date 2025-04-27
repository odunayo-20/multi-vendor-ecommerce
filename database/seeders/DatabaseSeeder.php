<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Buyer;
use App\Models\User;
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

        Buyer::factory()->create([
            'name' => 'Buyer Name',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('12345'),
        ]);
        // Admin::factory()->create([
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345'),
        // ]);
    }
}
