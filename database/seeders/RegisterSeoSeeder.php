<?php

namespace Database\Seeders;

use App\Models\RegisterSeo;
use Illuminate\Database\Seeder;

class RegisterSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        RegisterSeo::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(10)
        ]);
    }
}
