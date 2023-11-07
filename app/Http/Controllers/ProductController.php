<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Admin_Menu;
use App\Models\Catalog_Category;
use App\Models\TableSetting;
use App\Models\ProductShop;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Schema;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index_products() // общая страница товаров
    {
        $page_title = 'Product';
        $table_name = 'products';

        $active_inactive_columns = Product::getActiveAndInactiveColumns();
        $active_columns = $active_inactive_columns['active_columns'];
        $inactive_columns = $active_inactive_columns['inactive_columns'];
        $columns = $active_inactive_columns['columns'];

        $products = Product::with('categories')->get();
        $shops = Shop::all();

        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        $catalog_categories = Catalog_Category::where('parent_id', '=', 1)->get();
        $all_categories = Catalog_Category::where('parent_id', '!=', 0)->get();
        $identificators = Schema::getColumnListing('products');


        /* $product = Product::find(5);
        dd($product->categories()->all()); */

        return view('admin_part.products.content_container', compact('all_categories', 'inactive_columns', 'columns', 'shops', 'products', 'admin_menu_points', 'catalog_categories', 'page_title', 'table_name', 'identificators'));
    }

    public function filter_products(Request $request) // фильтрует товары на общей странице товаров
    {
        $shopName = $request->input('shop');
        $categoryName = $request->input('category');
        $status = $request->input('status');

        $page_title = 'Product';
        $table_name = 'products';
        $active_inactive_columns = Product::getActiveAndInactiveColumns();
        $active_columns = $active_inactive_columns['active_columns'];
        $inactive_columns = $active_inactive_columns['inactive_columns'];
        $columns = $active_inactive_columns['columns'];
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

        return view('admin_part.products.content_container', compact('products', 'page_title', 'columns', 'table_name', 'inactive_columns', 'shops', 'all_categories', 'admin_menu_points'));
    }

    public function sort_products(Request $request) // сортирует товары
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

        $table_name = 'products';
        $tableSetting = TableSetting::where('table_name', $table_name)->first();

        if ($tableSetting->settings === '{}') {
            $columns = json_decode($tableSetting->default)->data;
        } else {
            $columns = json_decode($tableSetting->settings)->data;
        }

        usort($columns, function ($a, $b) {
            return $a->sort - $b->sort;
        });

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
                return $product->categories->first()->title;
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'cost') {
            $products = $products->sortBy(function ($product) {
                return ProductShop::where('product_id', $product->id)->first()->cost;
            }, SORT_REGULAR, $sortValue === 'asc');
        } elseif ($collumnName === 'quantity') {
            $products = $products->sortBy(function ($product) {
                return ProductShop::where('product_id', $product->id)->first()->quantity;
            }, SORT_REGULAR, $sortValue === 'asc');
        }

        return response()->json([
            'success' => true,
            'html' => view('admin_part.products.product_table', [
                'products' => $products,
                'admin_menu_points' => $admin_menu_points,
                'catalog_categories' => $catalog_categories,
                'page_title' => $page_title,
                'columns' => $columns,
            ])->render()
        ]);
    }

    public function show_product() // детальная страница товаров
    {
    }

    public function create_product() // страница добавления товара
    {
        $page_title = 'Add Product';
        $table_name = 'products';

        /* $active_inactive_columns = Product::getActiveAndInactiveColumns();
        $active_columns = $active_inactive_columns['active_columns'];
        $inactive_columns = $active_inactive_columns['inactive_columns'];
        $columns = $active_inactive_columns['columns']; */

        $categories = Catalog_Category::all();

        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        return view('admin_part.products.add_page', compact('page_title', 'admin_menu_points', 'categories'));
    }

    public function store_product(Request $request) // добавить товар
    {
        $product = new Product();

        $product->title = ($request->title);
        $product->symbolic_code = ($request->symbolic_code);
        if ($request->anounce_img == null) {
        } else {
            $product->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }
        $product->anounce_text = ($request->anounce_text);

        if ($request->detail_img != null) {
            $detailImgNames = [];
            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }
            $product->detail_img = json_encode($detailImgNames);
        }

        $product->detail_text = ($request->detail_text);
        /* $product->seo_title = ($request->title); */
        /* $product->seo_description = ($request->title); */
        /* $product->status = ($request->title); */
        /* dd($detailImgNames); */

        $product->save();

        $category = Catalog_Category::where('symbolic_code', '=', $request->category)->first();
        $product->categories()->attach($category);

        $table_name = 'products';

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

        return redirect()->route('index_product_table', 'columns');
    }

    public function edit_products($id) // страница редактирования товара
    {
        $page_title = 'Edit Product';
        $table_name = 'products';

        $product = Product::find($id);
        /* $active_inactive_columns = Product::getActiveAndInactiveColumns();
        $active_columns = $active_inactive_columns['active_columns'];
        $inactive_columns = $active_inactive_columns['inactive_columns'];
        $columns = $active_inactive_columns['columns']; */

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
        /* dd($product->detail_img); */

        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();
        return view('admin_part.products.edit_page', compact('page_title', 'admin_menu_points', 'shops', 'selected_shops', 'inactive_shops', 'categories', 'selected_categories', 'inactive_categories', 'product', 'shops'));
    }

    public function update_product(Request $request, $id) // обновить товар
    {
        $product = Product::find($id);

        $product->title = ($request->title);
        $product->symbolic_code = ($request->symbolic_code);
        if ($request->anounce_img == null) {
        } else {
            $product->anounce_img = $request->anounce_img->storeAs('/', $request->anounce_img->getClientOriginalName(), 'public');
        }
        $product->anounce_text = ($request->anounce_text);

        if ($request->detail_img != null) {
            $detailImgNames = [];
            foreach ($request->detail_img as $detailImg) {
                $detailImgNames[] = $detailImg->getClientOriginalName();
                $detailImg->storeAs('/', $detailImg->getClientOriginalName(), 'public');
            }
            $product->detail_img = json_encode($detailImgNames);
        }

        $product->detail_text = ($request->detail_text);



        $product->save();

        $category = Catalog_Category::where('symbolic_code', '=', $request->category)->first();
        /* $product->categories()->attach($category); */

        /* dd($request->shop); */
        /* dd($request->category); */
        $product->shops()->sync($request->shop);
        $product->categories()->sync($request->category);
        $table_name = 'products';

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

        return redirect()->route('index_product_table');
    }

    public function delete_product($id) // soft deletes (мягкое) удаление товара
    {
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $import = new ProductsImport();

        Excel::import($import, $request->file/* file('file') */, null, \Maatwebsite\Excel\Excel::XLSX);

        /* $failures = $import->failures();

        if ($failures->isNotEmpty()) {
            foreach ($failures as $failure) {
                $failure->row(); // Номер строки, на которой произошла ошибка
                $failure->attribute(); // Название атрибута, на котором произошла ошибка
                $failure->errors(); // Ошибки, связанные с этой ошибкой
                $failure->values(); // Значения, связанные с этой ошибкой
            }
        } */

        // Дополнительные действия после импорта
        // ...

        return redirect()->back()->with('success', 'Импорт успешно выполнен');
    }
}
