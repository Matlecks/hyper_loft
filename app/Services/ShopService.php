<?php

namespace App\Services;

use App\Models\Shop;
use App\Models\Admin_Menu;
use App\Models\Catalog_Category;
use App\Models\ProductCategory;
use App\Models\ProductShop;
use Illuminate\View\View;
use Illuminate\Http\Request;

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

    public function getCreateShopData()
    {
        $page_title = 'Add Shop';
        $table_name = 'shops';
        /* $categories = Catalog_Category::all(); */
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        return compact('page_title', 'admin_menu_points', /* 'categories' */);
    }

    public function storeShop(Request $request)
    {
        $shop = new Shop();
        $shop->title = $request->title;
        $shop->symbolic_code = $request->symbolic_code;
        $shop->adress = $request->adress;
        $shop->phone = $request->phone;
        $shop->email = $request->email;
        $shop->schedule = $request->schedule;
        $shop->pay_variables = $request->pay_variables;

        if ($request->hasFile('anounce_img')) {
            $shop->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }

        $shop->anounce_text = $request->anounce_text;

        if ($request->hasFile('detail_img')) {
            $detailImgNames = [];

            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }

            $shop->detail_img = json_encode($detailImgNames);
        }

        $shop->detail_text = $request->detail_text;
        $shop->save();

/*         $category = Catalog_Category::where('symbolic_code', $request->category)->first();
        $shop->categories()->attach($category);
 */
        return redirect()->route('index_shops');
    }

    public function getEditShopData($id)
    {
        $page_title = 'Edit Product';
        $shop = Shop::find($id);
        $shop->detail_img = json_decode($shop->detail_img);
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        return compact('page_title', 'admin_menu_points', 'shop');
    }

    public function updateShop($request, $id)
    {
        $shop = Shop::find($id);
        $shop->title = $request->title;
        $shop->symbolic_code = $request->symbolic_code;
        $shop->adress = $request->adress;
        $shop->phone = $request->phone;
        $shop->email = $request->email;
        $shop->schedule = $request->schedule;
        $shop->pay_variables = $request->pay_variables;

        if ($request->hasFile('anounce_img')) {
            $shop->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }

        $shop->anounce_text = $request->anounce_text;

        if ($request->hasFile('detail_img')) {
            $detailImgNames = [];

            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }

            $shop->detail_img = json_encode($detailImgNames);
        }

        $shop->detail_text = $request->detail_text;
        $shop->save();

/*         $shop->shops()->sync($request->shop);
        $shop->categories()->sync($request->category);
 */

        return redirect()->route('index_shops');
    }


}
