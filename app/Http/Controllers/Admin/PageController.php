<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;


class PageController extends Controller
{
    public function carousel(){
        $reviews = Review::findCarouselReviews();
        return view('carousel', ['reviews' => $reviews]);
    }
}
