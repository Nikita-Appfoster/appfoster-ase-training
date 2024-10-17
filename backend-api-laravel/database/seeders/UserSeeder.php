<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'website' => $faker->domainName,
                'company_name' => $faker->company,
            ]);
        }
    }
}
