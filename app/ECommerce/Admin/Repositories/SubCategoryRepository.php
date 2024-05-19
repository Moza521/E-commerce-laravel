<?php

namespace ECommerce\Admin\Repositories;

use ECommerce\Admin\Models\Category;
use ECommerce\Admin\Models\SubCategory;
use ECommerce\Base\Repositories\AbstractRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryRepository extends AbstractRepository
{
    public function __construct(SubCategory $subCategory)
    {
        $this->setModel($subCategory);
    }
    

    public function getSubCategoryForSpecificCategory($category_id)
    {
        return SubCategory::where('category_id', $category_id)->get();
    }


    public function store(Request $request, $category_id)
    {
        $subCategory = new SubCategory();
        $subCategory->title = $request->get('title');
        $subCategory->description = $request->get('description');
        $subCategory->category_id = $category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('SubCategoryImages', 'public');
            $subCategory->image = $imagePath;
        }

        $subCategory->save();
        return $subCategory;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = SubCategory::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('SubCategoryImages', 'public');
            $data['image'] = $imagePath;
        }
        
        return $this->edit($data, $model);
    }

}
