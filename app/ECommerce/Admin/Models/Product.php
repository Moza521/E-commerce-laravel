<?php

namespace ECommerce\Admin\Models;

use ECommerce\User\Models\Review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'discount_price',
        'category_id',
        'subCategory_id',
        'brand_id',
        'quantity',
        'sold',
        'ratingsAverage',
        'ratingsQuantity',
        'active'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function color()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function size()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
