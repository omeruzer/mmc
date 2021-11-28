<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); 

        About::create([
            'about' =>  $faker->sentence(50),
            'keyw'  =>  $faker->sentence(2),
            'desc'  =>  $faker->sentence(2),
        ]);
    }
}
