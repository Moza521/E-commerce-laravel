<?php

namespace ECommerce\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
}
