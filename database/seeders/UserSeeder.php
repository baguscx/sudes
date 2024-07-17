<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Kades',
            'email' => 'kades@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('kades');

        User::create([
            'name' => 'Staff',
            'email' => 'staff@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('staff');

        User::create([
            'name' => 'Warga',
            'email' => 'warga@sudes.com',
            'password' => bcrypt('password'),
        ])->assignRole('warga');
    }
}
