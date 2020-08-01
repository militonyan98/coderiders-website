@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carousel Reviews') }}</div>
                
                <div>
                @foreach ($carousel_reviews as $review)
                    <div class="container" style="margin: 20px 20px; width:auto;">
                        <div class="card">
                            <div><?=$review->id?></div>
                            <div><?=$review->client_name?></div>
                            <div><?=$review->review_body?></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection