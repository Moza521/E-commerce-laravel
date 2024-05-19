<?php

namespace App\Http\Controllers\User\Reviews;

use App\Http\Controllers\Controller;
use ECommerce\User\Repositories\ReviewRepository;
use ECommerce\User\Requests\CreateReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index($product_id)
    {
        return $this->reviewRepository->index($product_id);
    }

    public function show($id)
    {
        return $this->reviewRepository->show($id);
    }

    public function store(Request $request, $product_id)
    {
        return $this->reviewRepository->store($request, $product_id);
    }

    public function update(Request $request, $id, $product_id)
    {
        return $this->reviewRepository->update($request, $id, $product_id);
    }


    public function destroy($id)
    {
        return $this->reviewRepository->destroy($id);
    }
}
