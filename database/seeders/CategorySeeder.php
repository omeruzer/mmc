<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {

            $title  =   $faker->sentence(2);
            $keyw   =   $faker->sentence(2);
            $desc   =   $faker->sentence(10);

            Category::create([
                'title' =>  $title,
                'slug'  =>  Str::slug($title),
                'keyw'  =>  $keyw,
                'desc'  =>  $desc
            ]);
        }
    }
}
