<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShopService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ShopController extends Controller
{
    protected ShopService $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index_shops(): View
    {
        return $this->shopService->indexShops();
    }

    public function sort_shops(Request $request): JsonResponse
    {
        $data = $this->shopService->sortShops($request);

        return response()->json([
            'success' => true,
            'html' => view('admin_part.shops.shop_table', $data)->render()
        ]);
    }
}
