<?php

namespace ECommerce\User\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ECommerce\User\Models\Review;


class ReviewRepository
{
    public function index($product_id)
    {
        return Review::where('product_id', $product_id)->with('user')->get();
    }

    public function show($id)
    {
        return Review::findOrFail($id)->with('user')->get();
    }


    public function store(Request $request, $product_id)
    {
        $review = new Review();

        $review->title = $request->get('title');
        $review->user_id = Auth::user()->id;
        $review->product_id = $product_id;

        $review->save();

        return $review;
    }


    public function update(Request $request, $id, $product_id)
    {
        $review = Review::findOrFail($id);

        $review->title = $request->get('title');
        $review->user_id = Auth::user()->id;
        $review->product_id = $product_id;

        $review->save();

        return $review;
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return response()->json(['status' => 'deleted'], 200);
    }
}
