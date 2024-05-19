<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Base\Repositories\AbstractRepository;
use ECommerce\User\Models\Order;
use Illuminate\Http\Request;

use ECommerce\User\Repositories\OrderHistoryRepository;

class AdminOrderRepository extends AbstractRepository
{
    private OrderHistoryRepository $orderHistoryRepository;

    public function __construct(Order $order, OrderHistoryRepository $orderHistoryRepository)
    {
        $this->setModel($order);
        $this->orderHistoryRepository = $orderHistoryRepository;
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        if ($request->get('status') == "accept") {
            $this->orderHistoryRepository->store($order->email, $order->id);
        }

        return $order;
    }

}
