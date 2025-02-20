<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\ProductSizeRepository;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    private ProductSizeRepository $productSizeRepository;

    public function __construct(ProductSizeRepository $productSizeRepository)
    {
        $this->productSizeRepository = $productSizeRepository;
    }

    public function index($shop_product_id)
    {
        return $this->productSizeRepository->index($shop_product_id);
    }

    public function store(Request $request, $shop_product_id)
    {
        return $this->productSizeRepository->store($request, $shop_product_id);
    }

    public function destroy($id)
    {
        return $this->productSizeRepository->delete($id);
    }
}
