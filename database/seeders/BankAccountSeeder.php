<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0;$i<3;$i++){

            $bankName = $faker->sentence(1);
            $accountNumber = rand(46845468,96845468);

            BankAccount::create([
                'bankName'      =>  $bankName,
                'accountNumber' =>  $accountNumber
            ]);

        }
    }
}
