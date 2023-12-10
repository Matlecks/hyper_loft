<?php

namespace App\Http\Controllers;

use App\Models\Admin_Menu;
use App\Models\SearchIndex;
use App\Models\SearchSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\SearchService;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index_search()
    {
        $data = $this->searchService->indexSearch();
        return view('admin_part.search.content_container', $data);
    }

    public function store_setting_search(Request $request, SearchService $searchService)
    {
        return $searchService->storeSettingSearch($request);
    }
    public function update_setting_search(Request $request, $id)
    {
    }

    public function reindex_admin_search($name_reindex_form, SearchService $searchService)
    {
        return $searchService->reindexAdminSearch($name_reindex_form);
    }

    public function search(Request $request, SearchService $searchService)
    {
        $keyword = $request->input('keyword');
        $results = $searchService->search($keyword);
        /* return response()->json($results); */

        return response()->json([
    'success' => true,
    'html' => view('admin_part.blocks.search_dropdown', ['results' => $results])->render()
]);
    }
    public function create(Request $request)
    {
        $searchKey = $request->input('search_key');
        $tags = $request->input('tags');
        $table = $request->input('table');

        $searchIndex = new SearchIndex();
        $searchIndex->search_key = $searchKey;
        $searchIndex->tags = $tags;
        $searchIndex->table = $table;
        $searchIndex->save();

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
