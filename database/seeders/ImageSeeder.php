<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
            Image::create([
            'img'       => 'sample_'. $i+1 .'.jpg',
            'product'   => $i+1
            ]);
        }
    }
}
