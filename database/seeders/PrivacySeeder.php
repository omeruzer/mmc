<?php

namespace Database\Seeders;

use App\Models\Privacy;
use Illuminate\Database\Seeder;

class PrivacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Privacy::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(20),
            'privacy' => $faker->sentence(200),

        ]);

    }
}
