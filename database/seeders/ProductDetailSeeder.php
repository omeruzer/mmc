<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30 ; $i++) { 
            
            ProductDetail::create([

                'product' => rand(1,30),
                'featured' => rand(0,1)
                
            ]);

        }
    }
}
