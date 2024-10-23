<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nama'=> 'Administrator',
            'email'=> 'admin@gmail.com',
            'role'=> '1',
            'status'=> 1,
            'hp'=> '0812345678901',
            'password'=> bcrypt('P@55word'),
        ]);
        User::factory()->create([
            'nama'=> 'Elisabet',
            'email'=> 'elisabet@gmail.com',
            'role'=> '0',
            'status'=> 1,
            'hp'=> '081234567892',
            'password'=> bcrypt('P@55word'),
        ]);
    }
}
