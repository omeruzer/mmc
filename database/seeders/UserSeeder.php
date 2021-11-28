<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 

            User::create([
                'name'      =>  $faker->name(),
                'email'     =>  $faker->email(),
                'password'  =>  Hash::make($faker->sentence(1)),
                'manager'   =>  rand(0,1),
                'active'    =>  rand(0,1),
                'address'   =>  $faker->address(),
                'city'      =>  $faker->city(),
                'postCode'  =>  $faker->postcode(),
                'country'   =>  $faker->country(),
                'phone'     =>  $faker->phoneNumber(),
            ]);
        }

        User::create([
            'name'      =>  'Ömer Uzer',
            'email'     =>  'omeruzer@gmail.com',
            'password'  =>  Hash::make(123),
            'manager'   =>  1,
            'active'    =>  1,
            'address'   =>  $faker->address(),
            'city'      =>  $faker->city(),
            'postCode'  =>  $faker->postcode(),
            'country'   =>  $faker->country(),
            'phone'     =>  $faker->phoneNumber(),
        ]);


    }
}
