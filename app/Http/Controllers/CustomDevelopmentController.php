<?php

namespace App\Http\Controllers;

use App\Review;

class CustomDevelopmentController extends Controller
{
    public function index(){
        $carousel_reviews = Review::findCarouselReviews();

        return view('CustomDevelopment', ['carousel_reviews' => $carousel_reviews]);
    }
}
