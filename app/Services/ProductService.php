<?php

namespace App\Services;

use App\Imports\ProductsImport;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Admin_Menu;
use App\Models\Catalog_Category;
use App\Models\ProductCategory;
use App\Models\ProductShop;
use App\Models\Profile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function getIndexProductsData()
    {
        $page_title = 'Product';
        $pagination = Cache::get('products_pagination');
        $pagination = $pagination ? $pagination : 10;

        $products = Product::with('categories')->paginate($pagination);

        $pagination = Cache::get('products_pagination');

        foreach ($products as $product) {
            $productShop = ProductShop::where('product_id', $product->id)->get();
            foreach ($productShop as $item) {
                $product->cost = $item->cost;
                $product->quantity = $item->quantity;
            }
        }

        $shops = Shop::all();
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $all_categories = Catalog_Category::where('parent_id', '!=', 0)->get();
        $identificators = Schema::getColumnListing('products');

        return compact('all_categories', 'shops', 'products', 'admin_menu_points', 'page_title', 'identificators');
    }

    public function filterProducts($request)
    {
        $shopName = $request->input('shop');
        $categoryName = $request->input('category');
        $status = $request->input('status');
        $page_title = 'Product';
        $shops = Shop::all();
        $all_categories = Catalog_Category::where('parent_id', '!=', 0)->get();
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        if ($shopName == "All") {
            if ($categoryName == "All") {
                $products = Product::when($status != null && $status != "All", function ($query) use ($status) {
                    if ($status == "Active") {
                        $query->whereNull('updated_at');
                    } else {
                        $query->whereNotNull('updated_at');
                    }
                })
                    ->get();
            } else {
                $category = Catalog_Category::where('title', $categoryName)->first();
                $products = Product::whereHas('categories', function ($query) use ($category) {
                    $query->where('id', $category->id);
                })
                    ->when($status != null && $status != "All", function ($query) use ($status) {
                        if ($status == "Active") {
                            $query->whereNull('updated_at');
                        } else {
                            $query->whereNotNull('updated_at');
                        }
                    })
                    ->get();
            }
        } else {
            if ($categoryName == "All") {
                $shop = Shop::where('title', $shopName)->first();
                $products = $shop->products()
                    ->when($status != null && $status != "All", function ($query) use ($status) {
                        if ($status == "Active") {
                            $query->whereNull('products.updated_at');
                        } else {
                            $query->whereNotNull('products.updated_at');
                        }
                    })
                    ->get();
            } else {
                $shop = Shop::where('title', $shopName)->first();
                $category = Catalog_Category::where('title', $categoryName)->first();
                $products = $shop->products()
                    ->whereHas('categories', function ($query) use ($category) {
                        $query->where('id', $category->id);
                    })
                    ->when($status != null && $status != "All", function ($query) use ($status) {
                        if ($status == "Active") {
                            $query->whereNull('products.updated_at');
                        } else {
                            $query->whereNotNull('products.updated_at');
                        }
                    })
                    ->get();
            }
        }

        return compact('products', 'page_title', 'shops', 'all_categories', 'admin_menu_points');
    }


    public function getCreateProductData()
    {
        $page_title = 'Add Product';
        $table_name = 'products';
        $categories = Catalog_Category::all();
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        return compact('page_title', 'admin_menu_points', 'categories');
    }

    public function storeProduct(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->symbolic_code = $request->symbolic_code;

        if ($request->hasFile('anounce_img')) {
            $product->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }

        $product->anounce_text = $request->anounce_text;

        if ($request->hasFile('detail_img')) {
            $detailImgNames = [];

            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }

            $product->detail_img = json_encode($detailImgNames);
        }

        $product->detail_text = $request->detail_text;
        $product->save();

        $category = Catalog_Category::where('symbolic_code', $request->category)->first();
        $product->categories()->attach($category);

        return redirect()->route('index_products');
    }

    public function getEditProductData($id)
    {
        $page_title = 'Edit Product';
        $product = Product::find($id);
        $categories = Catalog_Category::all();
        $selected_categories_from_pivot = ProductCategory::where('product_id', '=', $id)->get();
        $inactive_categories = $categories->reject(function ($category) use ($selected_categories_from_pivot) {
            return $selected_categories_from_pivot->contains('category_id', $category->id);
        });
        $selected_categories = $categories->diff($inactive_categories);
        $shops = Shop::all();
        $selected_shops_from_pivot = ProductShop::where('product_id', '=', $id)->get();
        $inactive_shops = $shops->reject(function ($shop) use ($selected_shops_from_pivot) {
            return $selected_shops_from_pivot->contains('shop_id', $shop->id);
        });
        $selected_shops = $shops->diff($inactive_shops);
        $product->detail_img = json_decode($product->detail_img);
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        return compact('page_title', 'admin_menu_points', 'shops', 'selected_shops', 'inactive_shops', 'categories', 'selected_categories', 'inactive_categories', 'product', 'shops');
    }

    public function updateProduct($request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->symbolic_code = $request->symbolic_code;

        if ($request->hasFile('anounce_img')) {
            $product->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }

        $product->anounce_text = $request->anounce_text;

        if ($request->hasFile('detail_img')) {
            $detailImgNames = [];

            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }

            $product->detail_img = json_encode($detailImgNames);
        }

        $product->detail_text = $request->detail_text;
        $product->save();

        $category = Catalog_Category::where('symbolic_code', $request->category)->first();
        $product->shops()->sync($request->shop);
        $product->categories()->sync($request->category);


        return redirect()->route('index_products');
    }

    public function sortProducts($request)
    {
        $collumnName = $request->input('collumn_name');
        $sortValue = $request->input('sort_value');
        if ($collumnName === 'category') {
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
        } else {
            $products = Product::with('categories')
                ->orderBy($collumnName, $sortValue)
                ->get();
        }
        $page_title = 'Product';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $catalog_categories = Catalog_Category::where('parent_id', '=', 1)
            ->orderBy('title', $sortValue)
            ->get();
        // Добавляем сортировку по колонкам 'updated_at', 'category', 'cost' и 'quantity'
        if ($collumnName === 'updated_at') {
            $products = $products->sortBy('updated_at', SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'category') {
            $products = $products->sortBy(function ($product) {
                $category = $product->categories->first();
                return $category ? $category->title : '';
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'cost') {
            $products = $products->sortBy(function ($product) {
                $productShop = ProductShop::where('product_id', $product->id)->first();
                return $productShop ? $productShop->cost : null;
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'quantity') {
            $products = $products->sortBy(function ($product) {
                $productShop = ProductShop::where('product_id', $product->id)->first();
                return $productShop ? $productShop->quantity : null;
            }, SORT_REGULAR, $sortValue === 'asc');
        }


        foreach ($products as $product) {
            $productShop = ProductShop::where('product_id', $product->id)->get();
            foreach ($productShop as $item) {
                $product->cost = $item->cost;
                $product->quantity = $item->quantity;
            }
        }

        return [
            'products' => $products,
            'admin_menu_points' => $admin_menu_points,
            'catalog_categories' => $catalog_categories,
            'page_title' => $page_title,
        ];
    }

    public function importData(Request $request, $id)
    {
        $profile = Profile::find($id);
        $import = new ProductsImport();
        $import->withData($profile);
        $file = $profile->file;
        $path = "/$file";
        // Получаем содержимое файла
        $contents = Storage::get($path);
        // Читаем файл Excel
        $excel_strings = Excel::toArray(new ProductsImport, $path)[0];
        $excel_strings = array_filter($excel_strings[0], function ($value) {
            return $value !== null;
        });
        $result = [];
        $for_map = [];
        $settings = json_decode($profile->settings, true);
        foreach ($settings as $key => $value) {
            $index = array_search($value, $excel_strings);
            $result[$key] = $index !== false ? $index : null;
        }
        $i = 0;
        foreach ($result as $key => $index) {
            $for_map[$i] = $index;
            $i++;
        }
        $profile->default_settings = $for_map;
        $profile->save();
        Excel::import($import, "/$profile->file", null, \Maatwebsite\Excel\Excel::XLSX);
        return redirect()->back()->with('success', 'Импорт успешно выполнен');
    }
}
