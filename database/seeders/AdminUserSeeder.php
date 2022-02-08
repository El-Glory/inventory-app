<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Favour',
            'email' => 'favouradmin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
