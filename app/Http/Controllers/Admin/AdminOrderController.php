<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Repositories\AdminOrderRepository;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private AdminOrderRepository $adminOrderRepository;

    public function __construct(AdminOrderRepository $adminOrderRepository)
    {
        $this->adminOrderRepository = $adminOrderRepository;
    }


    public function index()
    {
        return $this->adminOrderRepository->all();
    }


    public function show($id)
    {
        return $this->adminOrderRepository->find($id);
    }


    public function update(Request $request, $id)
    {
        return $this->adminOrderRepository->update($request, $id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->adminOrderRepository->search($search);
    }
}
