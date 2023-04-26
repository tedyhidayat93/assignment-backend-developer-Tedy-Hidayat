<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate 3 users with random data
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'fullname' => $faker->name(),
                'username' => $faker->unique()->userName(),
                'password' => Hash::make('p4ssword'),
            ]);
        }
    }
}
