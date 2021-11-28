<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
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
            
            $email = $faker->email();

            Newsletter::create([
                'email' => $email
            ]);
            
        }
    }
}
