<?php

namespace ECommerce\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ECommerce\Admin\Models\Product;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'title'];

    public function Shop_product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
