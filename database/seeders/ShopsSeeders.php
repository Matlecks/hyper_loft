<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'id' => 1,
            'title' => 'Котофей',
            'adress' => 'г. Санкт-Петербург, Невский проспект, 35',
            'phone' => '+7 000 000-00-00',
            'email' => 'info@site.ru',
            'schedule' => 'Пн - Пт: 9.00 - 18.00<br>
            Сб - Вс: выходные',
            'pay_variables' => '',
            'anounce_img' => 'https://max-demo.ru/upload/iblock/736/7363e59d5f3137b23eda8e893357e0c8.jpg',
            'anounce_text' => '',
            'detail_text' => 'В наших магазинах в Санкт-Петербурге представлен широкий ассортимент техники, строительных материалов, одежды и обуви, косметики, украшений, спортивного инвентаря и других товаров для жизни. Также мы оказываем услуги по кредитованию, ремонту электроники
             и доставке покупок. По всем вопросам вы можете проконсультироваться у наших менеджеров в торговых залах.',
            'seo_title' => '',
            'seo_description' => '',
        ]);

        Shop::create([
            'id' => 2,
            'title' => 'MINIDINO',
            'adress' => 'г. Москва, ул. Охотный Ряд, 2',
            'phone' => '+7 000 000-00-00',
            'email' => 'info@site.ru',
            'schedule' => 'Пн - Пт: 9.00 - 18.00<br> Сб - Вс: выходные',
            'pay_variables' => '',
            'anounce_img' => 'https://max-demo.ru/upload/iblock/620/620236b20b255e17854b0cbae1985128.jpg',
            'anounce_text' => '',
            'detail_text' => 'В наших магазинах в Москве представлен широкий ассортимент техники, строительных материалов, одежды и обуви, косметики, украшений, спортивного инвентаря и других товаров для жизни. Также мы оказываем услуги по кредитованию, ремонту
             электроники и доставке покупок. По всем вопросам вы можете проконсультироваться у наших менеджеров в торговых залах.',
            'seo_title' => '',
            'seo_description' => '',
        ]);
    }
}
