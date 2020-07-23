@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reviews') }}</div>
                
                <div>
                    @foreach ($reviews as $review)
                    <div class="container" style="margin: 20px 20px; width:auto;">
                        <div class="card">
                            <div><?=$review->id?></div>
                            <div><?=$review->client_name?></div>
                            
                            <div class="col-md- offset-md-5" style="margin-bottom: 5px;">
                                <a value="Edit" class="btn btn-primary" href="{{ route('edit-review', $review->id) }}">Edit</a>
                                <a value="Delete" class="btn btn-danger" href="{{ route('delete-review', $review->id) }}">Delete</a>

                                <a value="" class="btn btn-secondary" href="<?=$review->carousel_status==1?route('remove-from-carousel',$review->id):route('add-to-carousel',$review->id)?>"><?=$review->carousel_status==1?'Remove from carousel':'Add to carousel'?></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection