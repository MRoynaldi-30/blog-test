<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'name' => 'Administrator',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'author1',
                'password' => Hash::make('author123'),
                'name' => 'Author 1',
                'role' => 'author',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
