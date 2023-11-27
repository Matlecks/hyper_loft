<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Admin_Menu;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProfileController extends Controller
{
    public function index_profiles() // общая страница профилей
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'Profile';

        $profiles = Profile::all();

        return view('admin_part.profiles.content_container', compact('admin_menu_points', 'page_title', 'profiles'));
    }

    public function sort_profiles() // сортирует профили на общей странице профилей
    {
    }

    public function filter_profiles() // фильтрует профили на общей странице профилей
    {
    }

    public function show_profile() // детальная страница профиля
    {
    }

    public function create_profile() // страница добавления профиля
    {
        $page_title = 'Add Product';
        $table_name = 'profiles';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        return view('admin_part.profiles.add_page', compact('page_title', 'admin_menu_points', 'tables'));
    }

    public function get_columns(Request $request)
    {

        $tableName = $request->tableName;

        // Проверяем, существует ли таблица с указанным именем
        if (Schema::hasTable($tableName)) {
            $columns = Schema::getColumnListing($tableName);

            $html = '';
            foreach ($columns as $column) {
                $html .= '<option value="' . $column . '">' . $column . '</option>';
            }

            return response()->json([
                'success' => true,
                'columns' => $html
            ]);
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Таблица не найдена'
            ]);
        }
    }


    public function create_profile_with_file($id) // страница добавления профиля
    {
        $page_title = 'Add Product';
        $table_name = 'profiles';
        $admin_menu_points = Admin_Menu::where('parent_id', '=', 1)->get();

        $profile = Profile::find($id);

        $columns = Schema::getColumnListing($profile->table);
        $columns_orig = $columns;
        $column = $profile->identificator;

        $key = array_search($column, $columns);
        if ($key !== false) {
            unset($columns[$key]);
        }

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $table = $profile->table;

        $key = array_search($table, $tables);
        if ($key !== false) {
            unset($tables[$key]);
        }


        $file = $profile->file;
        $path = "/$file";

        // Получаем содержимое файла
        $contents = Storage::get($path);

        // Читаем файл Excel
        $excel_strings = Excel::toArray(new ProductsImport, $path)[0];

        /* dd($columns); */
        return view('admin_part.profiles.add_page', compact('page_title', 'admin_menu_points', 'profile', 'tables', 'table', 'columns_orig', 'columns', 'column', 'excel_strings'));
    }


    public function open_table_import_settings(Request $request)
    {
    }

    public function get_file_content(Request $request)
    {
    }

    public function store_profile(Request $request) // добавить профиль
    {

        $profile = new Profile();

        $profile->name = $request->title;
        $profile->table = $request->tables;
        $profile->identificator = $request->identificator;
        $profile->settings = "{}";

        if ($request->file) {
            $profile->file = $request->file->storeAs('/', $request->file->getClientOriginalName(), 'public');
        }

        $profile->save();

        return redirect()->route('create_profile_with_file', ['id' => $profile->id]);
    }

    public function edit_products() // страница редактирования профиля
    {
    }

    public function update_profile(Request $request, $id) // обновить профиль
    {

        /* dd($request); */
        $jsonArray = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'column_name_') !== false) {
                $index = substr($key, strlen('column_name_'));
                $headerKey = 'column_header_' . $index;
                $transformKey = 'column_transform_type_' . $index;
                /* dd($transformKey); */
                $jsonArray[$value] = $request->input($headerKey);
            }
        }
        $jsonData = json_encode($jsonArray, JSON_UNESCAPED_UNICODE);
/* dd($jsonData); */
        $profile = Profile::find($id);

        $profile->settings = $jsonData;

        $profile->save();


        return redirect()->route('index_profiles');

        /* return redirect()->route('products_import', ['id'=> $profile->id]); */
    }

    public function delete_product()
    {
    } // soft deletes (мягкое) удаление профиля

    public function export()
    {
    }

    public function import()
    {
    }
}
