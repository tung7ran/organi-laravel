<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'LeadSoft',
            'full_name' => 'LEADSOFT',
            'image' => 'https://img.icons8.com/bubbles/50/000000/user.png',
            'email' => 'test@leadsoft.com',
            'password' => Hash::make('leadsoft@123'),
            'status' => 1,
            'level' => 1,
        ]);
    }
}
