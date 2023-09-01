<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => env('INITIAL_ADMIN_NAME'),
            'email' => env('INITIAL_ADMIN_EMAIL'),
            'password' => bcrypt(env('INITIAL_ADMIN_PASSWORD')),
        ]);
    }
}
