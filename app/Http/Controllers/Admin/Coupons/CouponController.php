<?php

namespace App\Http\Controllers\Admin\Coupons;

use App\Http\Controllers\Controller;
use ECommerce\Admin\Models\Coupon;
use ECommerce\Admin\Repositories\CouponRepository;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private CouponRepository $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function index()
    {
        return $this->couponRepository->all();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->couponRepository->create($data);
    }

    public function show($id)
    {
        return $this->couponRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->couponRepository->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->couponRepository->delete($id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        return $this->couponRepository->search($search);
    }
}
