<?php

namespace App\Http\Controllers\Admin\Brands;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\BrandRepository;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private BrandRepository $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        return $this->brandRepository->all();
    }

    public function store(Request $request)
    {
        return $this->brandRepository->store($request);
    }

    public function show($id)
    {
        return $this->brandRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->brandRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->brandRepository->delete($id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->brandRepository->search($search);
    }
}
