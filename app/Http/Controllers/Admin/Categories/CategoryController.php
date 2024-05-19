<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return $this->categoryRepository->all();
    }

    public function store(Request $request)
    {
        return $this->categoryRepository->store($request);
    }

    public function show($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->categoryRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->categoryRepository->search($search);
    }
}
