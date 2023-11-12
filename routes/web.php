<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TableSettingsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::group(['prefix' => 'admin'/* , 'middleware' => 'auth' */], function () {
    Route::group(['prefix' => 'products'], function () {

        Route::get('/index_products', [ProductController::class, 'index_products'])->name('index_products'); // общая страница товаров

        Route::post('/filter_products', [ProductController::class, 'filter_products'])->name('filter_products'); // фильтрует товары на общей странице товаров

        Route::post('/sort_products', [ProductController::class, 'sort_products'])->name('sort_products'); // сортирует товары

        Route::get('/show_product', [ProductController::class, 'show_product'])->name('show_product'); // детальная страница товара

        Route::get('/create_product', [ProductController::class, 'create_product'])->name('create_product'); // страница добавления товара

        Route::post('/store_product', [ProductController::class, 'store_product'])->name('store_product'); // добавить товар

        Route::get('/edit_products_{id}', [ProductController::class, 'edit_products'])->name('edit_products'); // страница редактирования товара

        Route::post('/update_product_{id}', [ProductController::class, 'update_product'])->name('update_product'); // обновить товар

        Route::delete('/delete_product', [ProductController::class, 'delete_product'])->name('delete_product'); // soft deletes (мягкое) удаление товара

        Route::post('/update_settings_product_table_{table_name}', [TableSettingsController::class, 'update_product_table_settings'])->name('update_product_table_settings');

        Route::post('/update_to_default_product_table_settings_{table_name}', [TableSettingsController::class, 'update_to_default_product_table_settings'])->name('update_to_default_product_table_settings');

        Route::get('/export', [ProductController::class, 'export'])->name('products_export');

        Route::post('/import_{id}', [ProductController::class, 'import'])->name('products_import');
    });

    Route::group(['prefix' => 'shops'], function () {

        Route::get('/index_shops', [ShopController::class, 'index_shops'])->name('index_shops'); // общая страница магазинов

        Route::post('/sort_shops', [ShopController::class, 'sort_shops'])->name('sort_shops'); // сортирует магазины

    });

    Route::group(['prefix' => 'mail'/* , 'middleware' => 'auth' */], function () {

        Route::get('/index_mail', [MailController::class, 'index_mail'])->name('index_mail'); // общая страница почты

        Route::get('/filter_mail_{outbox}', [MailController::class, 'filter_mail'])->name('filter_mail'); // фильтрует письма на общей странице почты

        Route::get('/show_mail', [MailController::class, 'show_mail'])->name('show_mail'); // детальная страница письма

        Route::post('/create_mail', [MailController::class, 'create_mail'])->name('create_mail'); // отправка письма из админки

        Route::get('/edit_mail', [MailController::class, 'edit_mail'])->name('edit_mail'); // страница редактирования письма

        Route::post('/update_mail_{id}', [MailController::class, 'update_mail'])->name('update_mail'); // обновить письмо

        Route::post('/update_mails', [MailController::class, 'update_mails'])->name('update_mails'); // обновить письма массово

        Route::delete('/delete_mail', [MailController::class, 'delete_mail'])->name('delete_mail'); // soft deletes (мягкое) удаление письма

    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('/index_user', [UserController::class, 'index_user'])->name('index_user'); // общая страница почты

        Route::get('/filter_user', [UserController::class, 'filter_user'])->name('filter_user'); // фильтрует письма на общей странице почты

        Route::get('/sort_users_{column_name}_{sort}', [UserController::class, 'sort_users'])->name('sort_users'); // фильтрует письма на общей странице почты

        Route::get('/show_user_{id}', [UserController::class, 'show_user'])->name('show_user'); // детальная страница письма

        Route::post('/create_user', [UserController::class, 'create_user'])->name('create_user'); // отправка письма из админки

        Route::get('/edit_user_{id}', [UserController::class, 'edit_user'])->name('edit_user'); // страница редактирования письма

        Route::post('/update_user_{id}', [UserController::class, 'update_user'])->name('update_user'); // обновить письмо

        Route::post('/update_users', [UserController::class, 'update_users'])->name('update_users'); // обновить письма массово

        Route::delete('/delete_user', [UserController::class, 'delete_user'])->name('delete_user'); // soft deletes (мягкое) удаление письма

    });

    Route::group(['prefix' => 'services'], function () {

        Route::group(['prefix' => 'profiles'], function () {
            Route::get('/index_profiles', [ProfileController::class, 'index_profiles'])->name('index_profiles'); // общая страница профилей импорта

            /*             Route::post('/filter_products', [ProductController::class, 'filter_products'])->name('filter_products'); // фильтрует товары на общей странице товаров

            Route::post('/sort_products', [ProductController::class, 'sort_products'])->name('sort_products'); // сортирует товары

            Route::get('/show_product', [ProductController::class, 'show_product'])->name('show_product'); // детальная страница товара
 */
            Route::get('/create_profile', [ProfileController::class, 'create_profile'])->name('create_profile'); // страница добавления товара

            Route::get('/create_profile_with_file_{id}', [ProfileController::class, 'create_profile_with_file'])->name('create_profile_with_file'); // страница добавления товара

            Route::post('/get_columns', [ProfileController::class, 'get_columns'])->name('get_columns'); // получает имена всех колонок выбранной таблицы, чтобы выбрать уникальный идентификатор

            Route::post('/get_file_content', [ProfileController::class, 'get_file_content'])->name('get_file_content'); // получает содержимое эксель файла для отображении в создании профиля

            Route::post('/open_table_import_settings', [ProfileController::class, 'open_table_import_settings'])->name('open_table_import_settings'); // получает имена всех колонок выбранной таблицы, чтобы выбрать уникальный идентификатор

            Route::post('/store_profile', [ProfileController::class, 'store_profile'])->name('store_profile'); // добавить товар

            /*             Route::get('/edit_products_{id}', [ProductController::class, 'edit_products'])->name('edit_products'); // страница редактирования товара
 */
            Route::post('/update_profile_{id}', [ProfileController::class, 'update_profile'])->name('update_profile'); // обновить товар

            /*             Route::delete('/delete_product', [ProductController::class, 'delete_product'])->name('delete_product'); // soft deletes (мягкое) удаление товара

            Route::post('/update_settings_product_table_{table_name}', [TableSettingsController::class, 'update_product_table_settings'])->name('update_product_table_settings');

            Route::post('/update_to_default_product_table_settings_{table_name}', [TableSettingsController::class, 'update_to_default_product_table_settings'])->name('update_to_default_product_table_settings');

            Route::get('/export', [ProductController::class, 'export'])->name('products_export');

            Route::post('/import', [ProductController::class, 'import'])->name('products_import');
 */
        });
    });
});
