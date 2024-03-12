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
            'name'=> 'CyberControl Admin',
            'email'=> 'cybercontrol100@gmail.com',
            'password' => bcrypt('12345678'),
            'profile_id'=> 1,
            'company_id'=> 1
        ]);
    }
}
