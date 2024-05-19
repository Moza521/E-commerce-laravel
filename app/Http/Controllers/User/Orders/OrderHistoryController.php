<?php

namespace App\Http\Controllers\User\Orders;

use App\Http\Controllers\Controller;
use ECommerce\User\Repositories\OrderHistoryRepository;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    private OrderHistoryRepository $orderHistoryRepository;

    public function __construct(OrderHistoryRepository $orderHistoryRepository)
    {
        $this->orderHistoryRepository = $orderHistoryRepository;
    }

    public function index()
    {
        return $this->orderHistoryRepository->index();
    }

    public function userHistory($email)
    {
        return $this->orderHistoryRepository->userHistory($email);
    }
}
