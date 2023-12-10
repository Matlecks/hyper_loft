<?

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\SearchIndex;
use App\Models\Admin_Menu;
use App\Models\SearchSettings;
use Illuminate\Support\Facades\DB;

class SearchService
{
    public function indexSearch()
    {
        $admin_menu_points = Admin_Menu::where('parent_id', 1)->get();
        $page_title = 'Search Setting';
        $models_for_indexation = ['Product', 'Shop', 'User'];
        $settings_admin_collection = SearchSettings::where('title', '=', 'admin_search_settings')->get();
        $settings_admin = null; // объявляем переменную
        $selected_models_of_admin_settings = null; // объявляем переменную
        $unselected_models_of_admin_settings = null; // объявляем переменную
        $selected_sort_value = null; // объявляем переменную
        $unselected_sort_values = null; // объявляем переменную
        $tags = null; // объявляем переменную
        if (!empty($settings_admin_collection[0]->settings)) {
            $settings_admin = json_decode($settings_admin_collection[0]->settings);
            $selected_models_of_admin_settings = $settings_admin->identificator;
            $unselected_models_of_admin_settings = array_diff($models_for_indexation, $selected_models_of_admin_settings);
            $selected_sort_value = $settings_admin->sort;
            $sorts_values = ['ascending', 'descending'];
            $unselected_sort_values = array_diff($sorts_values, [$selected_sort_value]);
            $tags = $settings_admin->tags;
        }

        return compact('admin_menu_points', 'page_title', 'selected_models_of_admin_settings', 'unselected_models_of_admin_settings', 'selected_sort_value', 'unselected_sort_values', 'tags', 'settings_admin', 'models_for_indexation');
    }

    public function storeSettingSearch($requestData)
    {
        $requestData->request->remove('_token');
        $settingsInJson = json_encode($requestData->all());
        $setting = new SearchSettings();
        $setting->title = 'admin_search_settings';
        $setting->settings = $settingsInJson;
        $setting->save();
        return redirect()->back();
    }

    public function reindexAdminSearch($nameReindexForm)
    {
        $settingsAdminCollection = SearchSettings::where('title', '=', $nameReindexForm . '_search_settings')->get();
        $settingsAdmin = json_decode($settingsAdminCollection[0]->settings);
        $models = $settingsAdmin->identificator;
        SearchIndex::truncate();
        foreach ($models as $model) {
            // Получение заголовков из базы данных для каждой модели
            if ($model === 'Product' || $model === 'Shop') {
                $titles = DB::table($model . 's')->select('title', 'id')->get()->toArray();
            } elseif ($model === 'User') {
                $titles = DB::table($model . 's')->select('full_name', 'id')->get()->toArray();
            }
            foreach ($titles as $title) {
                // Добавление новой записи в таблицу SearchIndex
                $url = '';
                $element = [];
                switch ($model) {
                    case 'Product':
                        $element['title'] = $title->title;
                        $element['id'] = $title->id;
                        $url = '/admin/products/edit_products_' . $title->id;
                        $element['url'] = $url;
                        break;
                    case 'Shop':
                        // Логика для значения 'Shop'
                        $element['title'] = $title->title;
                        $element['id'] = $title->id;
                        $url = '/admin/shops/edit_shop_' . $title->id;
                        $element['url'] = $url;
                        break;
                    case 'User':
                        $element['title'] = $title->full_name;
                        $element['id'] = $title->id;
                        $url = '/admin/users/edit_user_' . $title->id;
                        $element['url'] = $url;
                        break;
                        // Добавьте другие варианты по мере необходимости
                    default:
                        // Логика по умолчанию, если значение 'table' не соответствует ни одному из вариантов
                        break;
                }
                /* dd($title); */
                SearchIndex::create([
                    'search_key' => $element['title'],
                    'table' => $model,
                    'item_id' => $element['id'],
                    'url' => $element['url']
                ]);
            }
        }
        return redirect()->route('index_search');
    }

    public function search($keyword)
    {
        $cacheKey = 'search_results_' . $keyword;
        if (Cache::has($cacheKey)) {
            $results = Cache::get($cacheKey);
        } else {
            $results = SearchIndex::where('search_key', 'LIKE', "%$keyword%")
                ->select('search_key', 'url')
                ->take(10)
                ->get();
            Cache::put($cacheKey, $results, 60);
        }
        return $results;
    }

    public function create($request)
    {
        $searchKey = $request->input('search_key');
        $tags = $request->input('tags');
        $table = $request->input('table');

        $searchIndex = new SearchIndex();
        $searchIndex->search_key = $searchKey;
        $searchIndex->tags = $tags;
        $searchIndex->table = $table;
        $searchIndex->save();

        return $searchIndex;
    }
}
