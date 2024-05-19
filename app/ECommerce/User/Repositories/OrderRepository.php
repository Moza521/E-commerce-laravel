<?php

namespace ECommerce\User\Repositories;

use ECommerce\Base\Repositories\AbstractRepository;
use ECommerce\User\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends AbstractRepository
{
    private OrderItemRepository $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository, Order $order)
    {
        $this->orderItemRepository = $orderItemRepository;
        $this->setModel($order);
    }


    public function store(Request $request)
    {
        $order = new Order();

        if (Auth::user() != null) {
            $order->user_id = Auth::user()->id;
            $order->title = Auth::user()->name;
            $order->email = Auth::user()->email;
        } else {
            $order->title = $request->get('title');
            $order->email = $request->get('email');
        }

        $order->phone = $request->get('phone');
        $order->address = $request->get('address');
        $order->city = $request->get('city');
        $order->state = $request->get('state');
        $order->zipCode = $request->get('zipCode');
        $order->country = $request->get('country');

        $order->shipping_method = $request->get('shipping_method');
        $order->shipping_amount = $request->get('shipping_amount');

        $order->tax_amount = $request->get('tax_amount');
        $order->payment_method = $request->get('payment_method');

        $order->notes = $request->get('notes');

        $order->total = $request->get('total');

        $order->save();

        // $this->orderItemRepository->store($request->input('sessionData'), $order->id);

        return $order;
    }
}
