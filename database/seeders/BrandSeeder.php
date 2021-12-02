<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'by MMC',
            'img'  => 'bymmc.png',
            'slug' => Str::slug('by MMC')
        ]);
        Brand::create([
            'name' => 'MARQUEZ',
            'img'  => 'marquez.png',
            'slug' => Str::slug('MARQUEZ')
        ]);
        Brand::create([
            'name' => 'M-UZER',
            'img'  => 'muzer.png',
            'slug' => Str::slug('M-UZER')
        ]);
    }
}
