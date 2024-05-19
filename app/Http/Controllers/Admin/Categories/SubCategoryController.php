<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private SubCategoryRepository $subCategoryRepository;

    public function __construct(SubCategoryRepository $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function index()
    {
        return $this->subCategoryRepository->all();
    }

    public function getSubCategoryForSpecificCategory($category_id)
    {
        return $this->subCategoryRepository->getSubCategoryForSpecificCategory($category_id);
    }

    public function store(Request $request, $category_id)
    {
        return $this->subCategoryRepository->store($request, $category_id);
    }

    public function show($id)
    {
        return $this->subCategoryRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->subCategoryRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->subCategoryRepository->delete($id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->subCategoryRepository->search($search);
    }
}
