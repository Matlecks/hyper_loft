<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductShop;

class Shops_Product_Relations_Seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductShop::create([
            'product_id' => 1,
            'shop_id' => 1,
            'quantity' => 11,
            'cost' => 66,
        ]);

        ProductShop::create([
            'product_id' => 2,
            'shop_id' => 1,
            'quantity' => 52,
            'cost' => 90,
        ]);

        ProductShop::create([
            'product_id' => 3,
            'shop_id' => 2,
            'quantity' => 365,
            'cost' => 5,
        ]);

        ProductShop::create([
            'product_id' => 4,
            'shop_id' => 2,
            'quantity' => 25,
            'cost' => 552,
        ]);
    }
}
