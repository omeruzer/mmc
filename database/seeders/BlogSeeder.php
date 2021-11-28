<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 30 ; $i++) {
            
            $title      = $faker->sentence(3);
            $keyw       = $faker->sentence(5);
            $desc       = $faker->sentence(10);
            $content    = $faker->sentence(100);

            
            Blog::create([
                'img'       =>  "sample_". $i+1 .".jpg",
                'title'     =>  $title,
                'slug'      =>  Str::slug($title),
                'hit'       =>  rand(0,250),
                'desc'      =>  $desc,
                'keyw'      =>  $keyw,
                'content'   =>  $content
            ]);
        }
    }
}
