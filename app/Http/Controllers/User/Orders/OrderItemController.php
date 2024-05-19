<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\Controller;
use ECommerce\User\Repositories\OrderItemRepository;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    private OrderItemRepository $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function index($order_id)
    {
        return $this->orderItemRepository->index($order_id);
    }
}
