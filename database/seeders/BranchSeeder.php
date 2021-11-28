<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); 

        for ($i=0; $i <5 ; $i++) { 

            $name = $faker->sentence(2);

            Branch::create([
                'name'      =>  $name,
                'slug'      =>  Str::slug($name),
                'address'   =>  $faker->address(),
                'phone'     =>  $faker->phoneNumber()
            ]);
        }
    }
}
