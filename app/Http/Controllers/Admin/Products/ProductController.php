<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\ProductRepository;
use Illuminate\Http\Request;
use SCM\Admin\ECommerce\Requests\CreateProduct;

class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    public function getProductsForSpecificCategory($category_id)
    {
        return $this->productRepository->getProductsForSpecificCategory($category_id);
    }

    public function getProductsForSpecificSubCategory($subCategory_id)
    {
        return $this->productRepository->getProductsForSpecificSubCategory($subCategory_id);
    }

    public function getProductsForSpecificBrand($brand)
    {
        return $this->productRepository->getProductsForSpecificBrand($brand);
    }


    public function store(Request $request)
    {
        return $this->productRepository->store($request);
    }


    public function show($id)
    {
        return $this->productRepository->show($id);
    }


    public function update(Request $request, $id)
    {
        return $this->productRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->productRepository->destroy((int)$id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->productRepository->search($search);
    }

    public function updateRating(Request $request, $id)
    {
        return $this->productRepository->updateRating($request, (int)$id);
    }

    public function destroyRating(Request $request, $id)
    {
        return $this->productRepository->destroyRating($request, (int)$id);
    }
}
