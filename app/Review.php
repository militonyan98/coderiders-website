<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public static function findCarouselReviews(){
        return self::where('carousel_status', 1)->orderBy('id', 'asc')->get();
    }
}
