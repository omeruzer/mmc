<?php

namespace Database\Seeders;

use App\Models\Messages;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10 ; $i++) { 
            
            $name       =   $faker->name();
            $email      =   $faker->email();
            $subject    =   $faker->sentence(3);
            $content    =   $faker->sentence(3);

            Messages::create([
                'isRead'    =>  rand(0,1),
                'name'      =>  $name,
                'email'     =>  $email,
                'subject'   =>  $subject,
                'content'   =>  $content
            ]);
        }
    }
}
