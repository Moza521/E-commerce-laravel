<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\ProductColorRepository;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    private ProductColorRepository $productColorRepository;

    public function __construct(ProductColorRepository $productColorRepository)
    {
        $this->productColorRepository = $productColorRepository;
    }

    public function index($shop_product_id)
    {
        return $this->productColorRepository->index($shop_product_id);
    }

    public function store(Request $request, $shop_product_id)
    {
        return $this->productColorRepository->store($request, $shop_product_id);
    }

    public function destroy($id)
    {
        return $this->productColorRepository->delete($id);
    }
}
