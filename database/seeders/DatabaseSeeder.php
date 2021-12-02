<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(BrandSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(SocialmediaSeeder::class);
        $this->call(FavoriteSeeder::class);
        $this->call(SSSSeeder::class);
        $this->call(TruckSeeder::class);
        $this->call(ProductDetailSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(BlogSeoSeeder::class);
        $this->call(LoginSeoSeeder::class);
        $this->call(SssSeoSeeder::class);
        $this->call(PrivacySeeder::class);
        $this->call(TermsandConditionsSeeder::class);
        $this->call(BankAccountSeeder::class);
    }
}
