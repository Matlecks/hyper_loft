<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_Menu;
use App\Models\TableSetting;
use App\Models\Shop;
use App\Models\Catalog_Category;

class ShopController extends Controller
{
    public function index_shops()
    {
        $shops = Shop::all();

        $page_title = 'Shop';
        $table_name = 'shops';

        $tableSetting = TableSetting::where('table_name', $table_name)->first();
        if ($tableSetting->settings === '{}') {
            $columns = json_decode($tableSetting->default)->data;
        } else {
            $columns = json_decode($tableSetting->settings)->data;
        }
        $all_default_columns = json_decode($tableSetting->default)->data;
        usort($columns, function ($a, $b) {
            return $a->sort - $b->sort;
        });

        $all_columns = [];

        foreach ($all_default_columns as $column) {
            $all_columns[] = $column->column_name;
        }

        $active_columns = [];

        foreach ($columns as $column) {
            $active_columns[] = $column->column_name;
        }

        $inactive_columns = array_diff($all_columns, $active_columns);
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $all_categories = Catalog_Category::where('parent_id', '!=', 0)->get();

        return view('admin_part.shops.content_container', compact('inactive_columns', 'columns', 'shops', 'admin_menu_points', 'page_title', 'table_name', 'all_categories'));
    }/* admin_part.tables.shop_table */

    public function sort_shops(Request $request) // сортирует магазины
    {

        $collumnName = $request->input('collumn_name');
        $sortValue = $request->input('sort_value');

        /* if ($collumnName === 'category') {
            $products = Product::with(['categories' => function ($query) use ($sortValue) {
                $query->orderBy('catalog__categories.title', $sortValue);
            }])
                ->get();
        } elseif ($collumnName === 'cost') {
            $products = Product::with(['shops' => function ($query) use ($sortValue) {
                $query->orderBy('product_shops.cost', $sortValue);
            }])
                ->get();
        } elseif ($collumnName === 'quantity') {
            $products = Product::with(['shops' => function ($query) use ($sortValue) {
                $query->orderBy('product_shops.quantity', $sortValue);
            }])
                ->get();
        } else { */
        $shops = Shop::/* with('categories')
                -> */orderBy($collumnName, $sortValue)
            ->get();
        /* } */

        $table_name = 'shops';
        $tableSetting = TableSetting::where('table_name', $table_name)->first();

        if ($tableSetting->settings === '{}') {
            $columns = json_decode($tableSetting->default)->data;
        } else {
            $columns = json_decode($tableSetting->settings)->data;
        }

        usort($columns, function ($a, $b) {
            return $a->sort - $b->sort;
        });

        $page_title = 'Shop';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        /* $catalog_categories = Catalog_Category::where('parent_id', '=', 1)
            ->orderBy('title', $sortValue)
            ->get(); */

        // Добавляем сортировку по колонкам 'updated_at', 'category', 'cost' и 'quantity'
        /* if ($collumnName === 'updated_at') {
            $shops = $shops->sortBy('updated_at', SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'category') {
            $shops = $shops->sortBy(function ($product) {
                return $product->categories->first()->title;
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'cost') {
            $shops = $shops->sortBy(function ($product) {
                return ProductShop::where('product_id', $product->id)->first()->cost;
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'quantity') {
            $products = $products->sortBy(function ($product) {
                return ProductShop::where('product_id', $product->id)->first()->quantity;
            }, SORT_REGULAR, $sortValue === 'asc');
        } */

        return response()->json([
            'success' => true,
            'html' => view('admin_part.tables.shop_table', [
                'shops' => $shops,
                'admin_menu_points' => $admin_menu_points,
                /* 'catalog_categories' => $catalog_categories, */
                'page_title' => $page_title,
                'columns' => $columns,
            ])->render()
        ]);
    }
}
