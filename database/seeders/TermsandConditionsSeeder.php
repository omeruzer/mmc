<?php

namespace Database\Seeders;

use App\Models\TermsandConditions;
use Illuminate\Database\Seeder;

class TermsandConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        TermsandConditions::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(20),
            'content' => $faker->sentence(200),

        ]);
    }
}
