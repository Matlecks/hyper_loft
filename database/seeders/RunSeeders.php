<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RunSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /* $this->call([
            AdminMenusSeeder::class,
            CatalogCategoriesSeeder::class,
        ]); */

        $this->call(AdminMenusSeeder::class);
        $this->call(CatalogCategoriesSeeder::class);
        $this->call(ProductsSeeders::class);
        $this->call(Products_Categories_Relations_Seeders::class);
        $this->call(ShopsSeeders::class);
        $this->call(Shops_Product_Relations_Seeders::class);
        $this->call(MailSeeder::class);
        User::factory()->count(10)->create();
    }
}
