<?php

namespace Database\Seeders;

use App\Models\BlogSeo;
use Illuminate\Database\Seeder;

class BlogSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        BlogSeo::create([
            'keyw' => $faker->sentence(2),
            'desc' => $faker->sentence(10)
        ]);
    }
}
