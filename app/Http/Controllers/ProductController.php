<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index_products(): View
    {
        $data = $this->productService->getIndexProductsData();
        return view('admin_part.products.content_container', $data);
    }

    public function filter_products(Request $request): View
    {
        $data = $this->productService->filterProducts($request);
        return view('admin_part.products.content_container', $data);
    }

    public function sort_products(Request $request): JsonResponse
    {
        $data = $this->productService->sortProducts($request);
        return response()->json([
            'success' => true,
            'html' => view('admin_part.products.product_table', $data)->render()
        ]);
    }

    /* public function show_product(): View
    {
        // Ваш код
    } */

    public function create_product(): View
    {
        $data = $this->productService->getCreateProductData();
        return view('admin_part.products.add_page', $data);
    }

    public function store_product(Request $request)
    {
        $this->productService->storeProduct($request);
        return redirect()->route('index_products');
    }

    public function edit_products($id): View
    {
        $data = $this->productService->getEditProductData($id);
        return view('admin_part.products.edit_page', $data);
    }

    public function update_product(Request $request, $id)
    {
        $this->productService->updateProduct($request, $id);
        return redirect()->route('index_products');
    }

    public function delete_product($id)
    {
        // Ваш код
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request, $id)
    {
        $this->productService->importData($request, $id);
        return redirect()->back()->with('success', 'Импорт успешно выполнен');
    }

    public function set_pagination(Request $request)
    {
        $pagination = $request->input('pagination');
        Cache::put('products_pagination', $pagination);

        return redirect()->route('index_products');
    }
}
