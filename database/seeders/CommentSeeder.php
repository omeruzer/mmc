<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 15; $i++) { 

            $comment = $faker->sentence(5);

            Comment::create([
                'product'   =>  rand(1,30),
                'user'      =>  rand(1,11),
                'comment'   =>  $comment,
                'isRead'    =>  rand(0,1)
            ]); 
        }
    }
}
