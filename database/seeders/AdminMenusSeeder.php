<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin_Menu;

class AdminMenusSeeder extends Seeder
{
    public function run(): void
    {
        // Верхний уровень
        Admin_Menu::create([
            'id' => 1,
            'title' => 'Верхний уровень',
            'img' => '',
            'parent_id' => 0,
        ]);

        // Второй уровень
        Admin_Menu::create([
            'id' => 2,
            'title' => 'Dashboards',
            'simbol_code' => 'dashboards',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                        <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 3,
            'title' => 'Content',
            'simbol_code' => 'content',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-layout-text-window-reverse" viewBox="0 0 16 16">
                        <path d="M13 6.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"></path>
                        <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM2 1a1 1 0 0 0-1 1v1h14V2a1 1 0 0 0-1-1H2zM1 4v10a1 1 0 0 0 1 1h2V4H1zm4 0v11h9a1 1 0 0 0 1-1V4H5z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 4,
            'title' => 'Ecommerce',
            'simbol_code' => 'ecommerce',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 5,
            'title' => 'Analitics',
            'simbol_code' => 'analitics',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"></path>
                        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 6,
            'title' => 'Services',
            'simbol_code' => 'services',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16">
                        <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"></path>
                        <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 7,
            'title' => 'Marketing',
            'simbol_code' => 'marketing',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                        <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        Admin_Menu::create([
            'id' => 8,
            'title' => 'Settings',
            'simbol_code' => 'settings',
            'img' => '
            <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"></path>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"></path>
                    </svg>
            ',
            'parent_id' => 1,
        ]);

        // Третий уровень
        Admin_Menu::create([
            'id' => 9,
            'title' => 'Яндекс Метрика',
            'simbol_code' => 'yandex_metrika',
            'img' => '',
            'parent_id' => 2,
        ]);

        Admin_Menu::create([
            'id' => 10,
            'title' => 'Catalog',
            'simbol_code' => 'catalog',
            'img' => '',
            'link' => '/admin/products/index_products',
            'parent_id' => 3,
        ]);

        Admin_Menu::create([
            'id' => 11,
            'title' => 'Shops',
            'simbol_code' => 'shops',
            'link' => '/admin/shops/index_shops',
            'img' => '',
            'parent_id' => 3,
        ]);

        Admin_Menu::create([
            'id' => 12,
            'title' => 'Stocks',
            'simbol_code' => 'stocks',
            'img' => '',
            'parent_id' => 3,
        ]);

        Admin_Menu::create([
            'id' => 13,
            'title' => 'Shops',
            'simbol_code' => 'shops',
            'img' => '',
            'parent_id' => 4,
        ]);

        Admin_Menu::create([
            'id' => 14,
            'title' => 'Stores',
            'simbol_code' => 'stores',
            'img' => '',
            'parent_id' => 4,
        ]);

        Admin_Menu::create([
            'id' => 15,
            'title' => 'Costs',
            'simbol_code' => 'costs',
            'img' => '',
            'parent_id' => 4,
        ]);

        Admin_Menu::create([
            'id' => 16,
            'title' => 'Payer types',
            'simbol_code' => 'payer_types',
            'img' => '',
            'parent_id' => 4,
        ]);

        Admin_Menu::create([
            'id' => 17,
            'title' => '---',
            'img' => '',
            'parent_id' => 5,
        ]);

        Admin_Menu::create([
            'id' => 18,
            'title' => 'Email',
            'simbol_code' => 'email',
            'link' => '/admin/mail/index_mail',
            'img' => '',
            'parent_id' => 6,
        ]);

        Admin_Menu::create([
            'id' => 19,
            'title' => 'Import/Export',
            'simbol_code' => 'import_export',
            'link' => '/admin/services/profiles/index_profiles',
            'img' => '',
            'parent_id' => 6,
        ]);

        Admin_Menu::create([
            'id' => 20,
            'title' => 'robots.txt',
            'simbol_code' => 'robots',
            'img' => '',
            'parent_id' => 7,
        ]);

        Admin_Menu::create([
            'id' => 21,
            'title' => 'sitemap.xml',
            'simbol_code' => 'sitemap',
            'img' => '',
            'parent_id' => 7,
        ]);

        Admin_Menu::create([
            'id' => 22,
            'title' => 'Open Graph',
            'simbol_code' => 'open_graph',
            'img' => '',
            'parent_id' => 7,
        ]);

        Admin_Menu::create([
            'id' => 23,
            'title' => 'Feeds',
            'simbol_code' => 'feeds',
            'img' => '',
            'parent_id' => 7,
        ]);

        Admin_Menu::create([
            'id' => 24,
            'title' => 'Search',
            'simbol_code' => 'search',
            'link' => '/admin/search/index_search',
            'img' => '',
            'parent_id' => 8,
        ]);

        Admin_Menu::create([
            'id' => 25,
            'title' => 'Users',
            'simbol_code' => 'users',
            'link' => '/admin/user/index_user',
            'img' => '',
            'parent_id' => 8,
        ]);

        Admin_Menu::create([
            'id' => 26,
            'title' => 'Modules',
            'simbol_code' => 'modules',
            'img' => '',
            'parent_id' => 8,
        ]);

        Admin_Menu::create([
            'id' => 27,
            'title' => 'Visual settings',
            'simbol_code' => 'visual_settings',
            'img' => '',
            'parent_id' => 8,
        ]);
    }
}
