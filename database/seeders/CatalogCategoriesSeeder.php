<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog_Category;

class CatalogCategoriesSeeder extends Seeder
{

    public function run(): void
    {
        Catalog_Category::create([
            'id' => 1,
            'parent_id' => 0,
            'title' => 'Верхний уровень',
            'symbolic_code' => 'first_lvl',
        ]);

        Catalog_Category::create([
            'id' => 2,
            'parent_id' => 1,
            'title' => 'Категория 1',
            'symbolic_code' => 'category_1',
            'anounce_text' => 'Анонс текст для категории 1',
            'anounce_image' => 'image1.jpg',
            'detail_text' => 'Детальный текст для категории 1',
            'detail_image' => 'detail_image1.jpg',
            'SEOTitle' => 'SEO заголовок для категории 1',
            'SEOKeys' => 'SEO ключевые слова для категории 1',
            'SEODescription' => 'SEO описание для категории 1',
            'ALTAnounceImg' => 'ALT текст для анонсного изображения 1',
            'TITLEAnounceImg' => 'TITLE текст для анонсного изображения 1',
            'FileNameAnounceImg' => 'image1.jpg',
            'ALTDetailsImg' => 'ALT текст для детального изображения 1',
            'FileNameDetailsImg' => 'detail_image1.jpg',
            'TAGS' => 'тег1, тег2, тег3',
        ]);

        Catalog_Category::create([
            'id' => 3,
            'parent_id' => 1,
            'title' => 'Категория 2',
            'symbolic_code' => 'category_2',
            'anounce_text' => 'Анонс текст для категории 2',
            'anounce_image' => 'image2.jpg',
            'detail_text' => 'Детальный текст для категории 2',
            'detail_image' => 'detail_image2.jpg',
            'SEOTitle' => 'SEO заголовок для категории 2',
            'SEOKeys' => 'SEO ключевые слова для категории 2',
            'SEODescription' => 'SEO описание для категории 2',
            'ALTAnounceImg' => 'ALT текст для анонсного изображения 2',
            'TITLEAnounceImg' => 'TITLE текст для анонсного изображения 2',
            'FileNameAnounceImg' => 'image2.jpg',
            'ALTDetailsImg' => 'ALT текст для детального изображения 2',
            'FileNameDetailsImg' => 'detail_image2.jpg',
            'TAGS' => 'тег4, тег5, тег6',
        ]);

        Catalog_Category::create([
            'id' => 4,
            'parent_id' => 2,
            'title' => 'Категория 3',
            'symbolic_code' => 'category_3',
            'anounce_text' => 'Анонс текст для категории 3',
            'anounce_image' => 'image3.jpg',
            'detail_text' => 'Детальный текст для категории 3',
            'detail_image' => 'detail_image3.jpg',
            'SEOTitle' => 'SEO заголовок для категории 3',
            'SEOKeys' => 'SEO ключевые слова для категории 3',
            'SEODescription' => 'SEO описание для категории 3',
            'ALTAnounceImg' => 'ALT текст для анонсного изображения 3',
            'TITLEAnounceImg' => 'TITLE текст для анонсного изображения 3',
            'FileNameAnounceImg' => 'image3.jpg',
            'ALTDetailsImg' => 'ALT текст для детального изображения 3',
            'FileNameDetailsImg' => 'detail_image3.jpg',
            'TAGS' => 'тег4, тег5, тег6',
        ]);

        Catalog_Category::create([
            'id' => 5,
            'parent_id' => 3,
            'title' => 'Категория 4',
            'symbolic_code' => 'category_4',
            'anounce_text' => 'Анонс текст для категории 4',
            'anounce_image' => 'image4.jpg',
            'detail_text' => 'Детальный текст для категории 4',
            'detail_image' => 'detail_image4.jpg',
            'SEOTitle' => 'SEO заголовок для категории 4',
            'SEOKeys' => 'SEO ключевые слова для категории 4',
            'SEODescription' => 'SEO описание для категории 4',
            'ALTAnounceImg' => 'ALT текст для анонсного изображения 4',
            'TITLEAnounceImg' => 'TITLE текст для анонсного изображения 4',
            'FileNameAnounceImg' => 'image4.jpg',
            'ALTDetailsImg' => 'ALT текст для детального изображения 4',
            'FileNameDetailsImg' => 'detail_image4.jpg',
            'TAGS' => 'тег4, тег5, тег6',
        ]);
    }
}
