<?php

namespace App\Services;

use App\Models\Shop;
use App\Models\Admin_Menu;
use App\Models\Catalog_Category;
use Illuminate\View\View;

class ShopService
{
    public function indexShops(): View
    {
        $shops = Shop::all();
        $page_title = 'Shop';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $all_categories = Catalog_Category::where('parent_id', '!=', 0)->get();
        return view('admin_part.shops.content_container', compact('shops', 'admin_menu_points', 'page_title', 'all_categories'));
    }

    public function sortShops($request): array
    {
        $collumnName = $request->input('collumn_name');
        $sortValue = $request->input('sort_value');

        $shops = Shop::orderBy($collumnName, $sortValue)
            ->get();

        $page_title = 'Shop';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        return [
            'shops' => $shops,
            'admin_menu_points' => $admin_menu_points,
            'page_title' => $page_title,
        ];
    }
}
