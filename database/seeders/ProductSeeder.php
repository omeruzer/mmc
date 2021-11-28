<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i <30 ; $i++) {
            
            $name       =   $faker->sentence(3);
            $desc       =   $faker->sentence(3);
            $keyw       =   $faker->sentence(3);
            $content    =   $faker->sentence(10);
            $country    =   $faker->country();
            $colors     =   $faker->colorName();
            $material   =   $faker->sentence(2);
            $pattern    =   $faker->sentence(2);
            $packQty    =   4;
            $size       =   $faker->randomLetter();

            
            $product = Product::create([
                'img'       =>  'sample_'. $i+1 .'.jpg',
                'name'      =>  $name,
                'slug'      =>  Str::slug($name),
                'code'      =>  rand(20000,40000),
                'category'  =>  rand(1,5),
                'brand'     =>  rand(1,3),
                'hit'       =>  rand(0,300),
                'keyw'      =>  $keyw,
                'desc'      =>  $desc,
                'content'   =>  $content,
                'price'     =>  $faker->randomFloat(3,1,50),
                'quantity'  =>  $faker->randomNumber(3),
                'country'   =>  $country,
                'colors'    =>  $colors,
                'material'  =>  $material,
                'pattern'   =>  $pattern,
                'packQty'   =>  $packQty,
                'size'      =>  $size
            ]);
        }
    }
}
