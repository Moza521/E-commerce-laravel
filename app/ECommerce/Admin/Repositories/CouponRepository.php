<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Coupon;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class CouponRepository extends AbstractRepository
{
    public function __construct(Coupon $coupon)
    {
        $this->setModel($coupon);
    } 

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = Coupon::findOrFail($id);
        return $this->edit($data, $model);
    }

}
