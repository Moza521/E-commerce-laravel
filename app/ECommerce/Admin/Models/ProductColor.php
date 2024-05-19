<?php

namespace ECommerce\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'product_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
