<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Brand;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class BrandRepository extends AbstractRepository
{
    public function __construct(Brand $brand)
    {
        $this->setModel($brand);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('BrandImages', 'public');
            $data['image'] = $imagePath;
        }

        return $this->create($data);
    }


    public function update(Request $request, $id)
    {
        $model = Brand::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('BrandImages', 'public');
            $data['image'] = $imagePath;
        }
        
        return $this->edit($data, $model);
    }
    
}
