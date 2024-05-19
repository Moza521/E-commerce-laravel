<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Category;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;

class CategoryRepository extends AbstractRepository
{
    public function __construct(Category $category)
    {
        $this->setModel($category);
    }
    

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('CategoryImages', 'public');
            $data['image'] = $imagePath;
        }

        return $this->create($data);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = Category::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('CategoryImages', 'public');
            $data['image'] = $imagePath;
        }
        
        return $this->edit($data, $model);
    }
}
