<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Review;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::all();

        return view('reviews', ['reviews'=>$reviews]);
    }

    public function create(Request $request){
        $request->validate([
            'clientName' => 'required|max:30',
            'clientCompany' => 'required|max:50',
            'clientPosition' => 'required|max:30',
            'clientReview' => 'required|max:500',
            'clientImage' => 'image|mimes:jpeg,png,jpg|max:2000000',
        ]);

        if($request->id!=null){
            $review = Review::findOrFail($request->id);
        }
        else{
            $review = new Review;
        }

        $review->client_name = $request->clientName;
        $review->client_company = $request->clientCompany;
        $review->client_position = $request->clientPosition;
        $review->review_body = $request->clientReview;
        
        if($request->file('clientImage')!=null){
            $path = $request->file('clientImage')->store('images');

            $review->client_image = $path;
        }

        $review->save();

        return redirect('reviews');
    }

    public function createIndex(){
        return view('review-creation', ['review' => new Review]);
    }

    public function edit($id){
        $review = Review::findOrFail($id);

        return view('review-creation', ['review'=>$review]);
    }

    public function delete($id){
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('reviews');
    }
}