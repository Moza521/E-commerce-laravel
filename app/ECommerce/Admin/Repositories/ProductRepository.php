<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Brand;
use ECommerce\Admin\Models\Category;
use ECommerce\Admin\Models\Product;
use ECommerce\Admin\Models\ProductImage;
use ECommerce\Admin\Models\SubCategory;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends AbstractRepository
{
    public function __construct(Product $product)
    {
        $this->setModel($product);
    }

    public function all()
    {
        return Product::with('review', 'color', 'size', 'image')->get();
    }


    public function getProductsForSpecificCategory($category_id)
    {
        return Product::with('review', 'color', 'size', 'image')->where('category_id', $category_id)->get();
    }

    public function getProductsForSpecificSubCategory($subCategory_id)
    {
        return Product::with('review', 'color', 'size', 'image')->where('subCategory_id', $subCategory_id)->get();
    }

    public function getProductsForSpecificBrand($brand_id)
    {
        return Product::with('review', 'color', 'size', 'image')->where('brand_id', $brand_id)->get();
    }


    public function store(Request $request)
    {

        if ($request->category_id) {
            Category::findOrFail($request->category_id);
        }
        if ($request->subCategory_id) {
            SubCategory::findOrFail($request->subCategory_id);
        }
        if ($request->brand_id) {
            Brand::findOrFail($request->brand_id);
        }

        $product = Product::create($request->all());

        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->category_id) {
            Category::findOrFail($request->category_id);
        }
        if ($request->subCategory_id) {
            SubCategory::findOrFail($request->subCategory_id);
        }
        if ($request->brand_id) {
            Brand::findOrFail($request->brand_id);
        }

        $product->update($request->all());
        return $product;
    }

    public function show($id)
    {
        return Product::with('review', 'color', 'size', 'image')->where('id', $id)->get();
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        $productImage = ProductImage::where('product_id', $id)->first();


        if (!empty($productImage->image)) {
            Storage::disk('public')->deleteDirectory('productImages/' . $productImage->product_id);
        }

        $product->delete();

        return response()->json(['status' => 'deleted'], 200);
    }


    public function updateRating(Request $request, $id)
    {
        $rating = Product::findOrFail($id);
        $sumOfRatings = $rating->ratingsAverage * $rating->ratingsQuantity;
        $sumOfRatings += $request->get('ratingsAverage');
        $totalRatings = $rating->ratingsQuantity + 1;
        $newAverageRating = $sumOfRatings / $totalRatings;
        $rating->ratingsAverage = $newAverageRating;
        $rating->ratingsQuantity = $totalRatings;

        $rating->save();
        return $rating;
    }


    public function destroyRating(Request $request, $id)
    {
        $rating = Product::findOrFail($id);
        $sumOfRatings = $rating->ratingsAverage * $rating->ratingsQuantity;
        $sumOfRatings -= $request->get('ratingsAverage');
        $totalRatings = $rating->ratingsQuantity - 1;
        $newAverageRating = $sumOfRatings / $totalRatings;
        $rating->ratingsAverage = $newAverageRating;
        $rating->ratingsQuantity = $totalRatings;

        $rating->save();
        return $rating;
    }
}
