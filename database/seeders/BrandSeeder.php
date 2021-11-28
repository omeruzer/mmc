<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); 

        for ($i=0; $i < 3 ; $i++) {
            
            $name = $faker->sentence(2);

            Brand::create([
               'name' => $name,
               'img'  => 'brand_'. $i+1 .'.png',
               'slug' => Str::slug($name)
            ]);
        }
    }
}
