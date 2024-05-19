<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\ProductImageRepository;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private ProductImageRepository $productImageRepository;

    public function __construct(ProductImageRepository $productImageRepository)
    {
        $this->productImageRepository = $productImageRepository;
    }

    public function index($shop_product_id)
    {
        return $this->productImageRepository->index($shop_product_id);
    }

    public function store(Request $request, $shop_product_id)
    {
        return $this->productImageRepository->store($request, $shop_product_id);
    }

    public function destroy($id)
    {
        return $this->productImageRepository->destroy($id);
    }
}
