<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\Controller;
use ECommerce\User\Repositories\OrderRepository;
use ECommerce\User\Requests\CreateOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return $this->orderRepository->all();
    }

    public function store(Request $request)
    {
        return $this->orderRepository->store($request);
    }


    public function show($id)
    {
        return $this->orderRepository->find($id);
    }

    public function destroy($id)
    {
        return $this->orderRepository->delete((int)$id);
    }
}
