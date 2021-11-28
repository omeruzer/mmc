<?php

namespace Database\Seeders;

use App\Models\Socialmedia;
use Illuminate\Database\Seeder;

class SocialmediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socialmedia::create([
            'facebook'  =>  'facebook',
            'instagram' =>  'instagram',
            'telegram'  =>  'telegram',
            'viber'     =>  'viber',
        ]);
    }
}
