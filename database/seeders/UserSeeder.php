<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Muhamad Indra Setiawan',
            'level' => 'admin',
            'email' => 'minsatya94@gmail.com',
            'password' => bcrypt('sherlock'),
            'remember_token' => Str::random(60),
        ]);
    }
}
