<?php

namespace Database\Seeders;

use App\Models\LoginSeo;
use Illuminate\Database\Seeder;

class LoginSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        LoginSeo::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(10)
        ]);
    }
}
