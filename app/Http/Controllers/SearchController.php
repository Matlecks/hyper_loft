<?php

namespace App\Http\Controllers;

use App\Models\Admin_Menu;
use App\Models\SearchIndex;
use App\Models\SearchSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function index_search()
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'Search Setting';

        $models_for_indexation = ['Product', 'Shop', 'User'];
        $settings_admin_collection = SearchSettings::where('title', '=', 'admin_search_settings')->get();
        $settings_admin = json_decode($settings_admin_collection[0]->settings);

        $selected_models_of_admin_settings = $settings_admin->identificator;
        $unselected_models_of_admin_settings = array_diff($models_for_indexation, $selected_models_of_admin_settings);

        $sorts_values = ['Ascending', 'Descending'];
        $selected_sort_value = $settings_admin->sort;
        $unselected_sort_values = array_diff($sorts_values, [$selected_sort_value]);

        $tags = $settings_admin->tags;

        return view('admin_part.search.content_container', compact('admin_menu_points', 'page_title', 'selected_models_of_admin_settings', 'unselected_models_of_admin_settings', 'selected_sort_value', 'unselected_sort_values', 'tags'));
    }

    public function store_setting_search(Request $request)
    {
        //убирает токен
        $request->request->remove('_token');

        $settings_in_json = json_encode($request->all());

        $setting = new SearchSettings();

        $setting->settings = $settings_in_json;

        $setting->save();

        return redirect()->back();
    }

    public function update_setting_search(Request $request, $id)
    {
    }

    public function reindex_admin_search($name_reindex_form)
    {
        $settings_admin_collection = SearchSettings::where('title', '=', $name_reindex_form . '_search_settings')->get();
        $settings_admin = json_decode($settings_admin_collection[0]->settings);
        $models = $settings_admin->identificator;

        SearchIndex::truncate();

        foreach ($models as $model) {
            // Получение заголовков из базы данных для каждой модели
            if ($model === 'Product' || $model === 'Shop') {
                $titles = DB::table($model.'s')->pluck('title')->toArray();
            } elseif ($model === 'User') {
                $titles = DB::table($model.'s')->pluck('full_name')->toArray();
            }

            foreach ($titles as $title) {
                // Добавление новой записи в таблицу SearchIndex
                SearchIndex::create([
                    'search_key' => $title,
                ]);
            }
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Выполнение поиска по ключевому слову
        $results = SearchIndex::where('search_key', 'LIKE', "%$keyword%")->get();

        // Возвращение результатов поиска в виде JSON или любого другого формата
        return response()->json($results);
    }

    public function create(Request $request)
    {
        $searchKey = $request->input('search_key');
        $tags = $request->input('tags');
        $table = $request->input('table');

        // Создание новой записи в таблице search_indices
        $searchIndex = new SearchIndex();
        $searchIndex->search_key = $searchKey;
        $searchIndex->tags = $tags;
        $searchIndex->table = $table;
        $searchIndex->save();

        // Возвращение успешного ответа или редиректа
        return response()->json(['message' => 'Search index created successfully']);
    }

    public function update(Request $request, $id)
    {
        $searchKey = $request->input('search_key');
        $tags = $request->input('tags');
        $table = $request->input('table');

        // Обновление существующей записи в таблице search_indices
        $searchIndex = SearchIndex::findOrFail($id);
        $searchIndex->search_key = $searchKey;
        $searchIndex->tags = $tags;
        $searchIndex->table = $table;
        $searchIndex->save();

        // Возвращение успешного ответа или редиректа
        return response()->json(['message' => 'Search index updated successfully']);
    }

    public function delete($id)
    {
        // Удаление записи из таблицы search_indices
        $searchIndex = SearchIndex::findOrFail($id);
        $searchIndex->delete();

        // Возвращение успешного ответа или редиректа
        return response()->json(['message' => 'Search index deleted successfully']);
    }
}
