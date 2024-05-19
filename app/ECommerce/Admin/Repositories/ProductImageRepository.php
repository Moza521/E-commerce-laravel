<?php

namespace ECommerce\Admin\Repositories;

use Illuminate\Http\Request;
use ECommerce\Admin\Models\Product;
use ECommerce\Admin\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageRepository
{
    public function index($product_id)
    {
        Product::findOrFail($product_id);

        return ProductImage::where('product_id', $product_id)->get();
    }


    public function store(Request $request, $product_id)
    {
        Product::findOrFail($product_id);

        $productImage = new ProductImage();
        $productImage->product_id = $product_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('productImages/'. $productImage->product_id, 'public');
            $productImage->image = $imagePath;
        }

        $productImage->save();
        return $productImage;
    }


    public function destroy(int $id)
    {
        $productImage = ProductImage::findOrFail($id);

        Storage::disk('public')->delete($productImage->image);


        $productImage->delete();

        return response()->json(['status' => 'deleted'], 200);
    }
}
