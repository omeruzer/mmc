<?php

namespace Database\Seeders;

use App\Models\SSS;
use Illuminate\Database\Seeder;

class SSSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){

            $faker = \Faker\Factory::create();

            $question = $faker->sentence(5);
            $answer = $faker->sentence(30);

            SSS::create([
                'question'  =>  $question,
                'answer'    =>  $answer
            ]);
        }
    }
}
