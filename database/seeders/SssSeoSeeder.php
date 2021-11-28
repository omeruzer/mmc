<?php

namespace Database\Seeders;

use App\Models\SssSeo;
use Illuminate\Database\Seeder;

class SssSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        SssSeo::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(10)
        ]);
    }
}
