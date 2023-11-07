<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class Products_Categories_Relations_Seeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'product_id' => 1,
            'category_id' => 2,
        ]);

        ProductCategory::create([
            'product_id' => 2,
            'category_id' => 3,
        ]);

        ProductCategory::create([
            'product_id' => 3,
            'category_id' => 4,
        ]);

        ProductCategory::create([
            'product_id' => 4,
            'category_id' => 5,
        ]);
    }
}
