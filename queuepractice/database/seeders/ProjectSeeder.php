<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
      
        for ($i = 0; $i < 3; $i++) {
            Project::create([
                
               
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'Active' => $faker->numberBetween(0, 1)
            ]);
        }
    }
}
