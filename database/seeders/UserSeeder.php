<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => 'admin',
            'email' => 'admin@indobeauty.com',
            'password' => bcrypt("password"),
            'remember_token' => Str::random(60),
        ]);
    }
}
