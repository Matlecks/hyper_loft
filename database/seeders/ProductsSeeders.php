<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'id' => 1,
            'title' => 'Adirondack Chair',
            'anounce_img' => 'https://coderthemes.com/hyper/saas/assets/images/products/product-6.jpg',
            'anounce_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
             as opposed to using "Content here, content here", making it look like readable English.',
            'detail_img' => '["https://coderthemes.com/hyper/saas/assets/images/products/product-6.jpg"]',
            'detail_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
            as opposed to using "Content here, content here", making it look like readable English.',
        ]);

        Product::create([
            'id' => 2,
            'title' => 'Amazing Modern Chair',
            'anounce_img' => 'https://coderthemes.com/hyper/saas/assets/images/products/product-1.jpg',
            'anounce_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
             as opposed to using "Content here, content here", making it look like readable English.',
            'detail_img' => '["https://coderthemes.com/hyper/saas/assets/images/products/product-1.jpg"]',
            'detail_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
            as opposed to using "Content here, content here", making it look like readable English.',
        ]);

        Product::create([
            'id' => 3,
            'title' => 'Bean Bag Chair',
            'anounce_img' => 'https://coderthemes.com/hyper/saas/assets/images/products/product-2.jpg',
            'anounce_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
             as opposed to using "Content here, content here", making it look like readable English.',
            'detail_img' => '["https://coderthemes.com/hyper/saas/assets/images/products/product-2.jpg"]',
            'detail_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
            as opposed to using "Content here, content here", making it look like readable English.',
        ]);

        Product::create([
            'id' => 4,
            'title' => 'Biblio Plastic Armchair',
            'anounce_img' => 'https://coderthemes.com/hyper/saas/assets/images/products/product-4.jpg',
            'anounce_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
             as opposed to using "Content here, content here", making it look like readable English.',
            'detail_img' => '["https://coderthemes.com/hyper/saas/assets/images/products/product-4.jpg"]',
            'detail_text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
            as opposed to using "Content here, content here", making it look like readable English.',
        ]);
    }
}
