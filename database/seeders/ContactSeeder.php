<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Contact::create([
            'address'   =>  $faker->address(),
            'phone'     =>  $faker->phoneNumber(),
            'email'     =>  $faker->email(),
            'keyw'     =>  $faker->sentence(2),
            'desc'     =>  $faker->sentence(10)
        ]);
    }
}
