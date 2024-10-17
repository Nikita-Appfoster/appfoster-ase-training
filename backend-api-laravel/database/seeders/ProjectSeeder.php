<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder

{
   
    public function run(): void
    {
        $faker = Faker::create();
        
        $userIds=User::pluck('id')->toArray();
        for ($i = 0; $i < 3; $i++) {
            Project::create([
                
                'user_id' => $faker->randomElement($userIds),
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
            ]);
        }
    }
}
