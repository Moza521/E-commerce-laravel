<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Product;
use ECommerce\Admin\Models\ProductColor;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class ProductColorRepository extends AbstractRepository
{
    public function __construct(ProductColor $productColor)
    {
        $this->setModel($productColor);
    }

    public function index($product_id)
    {
        Product::findOrFail($product_id);

        return productColor::where('product_id', $product_id)->get();
    }

    public function store(Request $request, $product_id)
    {
        Product::findOrFail($product_id);
        $productColor = new ProductColor();
        $productColor->color = $request->get('color');
        $productColor->product_id = $product_id;

        $productColor->save();
        return $productColor;
    }
}
