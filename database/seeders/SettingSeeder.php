<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Settings::create([
            'logo'      =>  'logo.png',
            'favicon'   =>  'favicon.png',
            'title'     =>  $faker->sentence(1).'com',
            'desc'      =>  $faker->sentence(5),
            'keyw'      =>  $faker->sentence(2),
            'author'    =>  $faker->name(),
        ]);
    }
}
