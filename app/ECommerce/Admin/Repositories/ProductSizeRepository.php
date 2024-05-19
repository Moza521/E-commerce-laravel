<?php

namespace ECommerce\Admin\Repositories;

use Illuminate\Http\Request;
use ECommerce\Admin\Models\Product;
use ECommerce\Admin\Models\ProductSize;
use ECommerce\Base\Repositories\AbstractRepository;

class ProductSizeRepository extends AbstractRepository
{
    public function __construct(ProductSize $productSize)
    {
        $this->setModel($productSize);
    }

    public function index($product_id)
    {
        Product::findOrFail($product_id);

        return ProductSize::where('product_id', $product_id)->get();
    }

    public function store(Request $request, $product_id)
    {
        Product::findOrFail($product_id);
        $productSize = new ProductSize();
        $productSize->length = $request->get('length');
        $productSize->width = $request->get('width');
        $productSize->height = $request->get('height');
        $productSize->Product_id = $product_id;

        $productSize->save();
        return $productSize;
    }
}
