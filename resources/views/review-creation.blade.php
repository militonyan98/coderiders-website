@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Review') }}</div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('review-creation') }}" style="margin: 20px 20px;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$review->id}}">
                        <input type="text" id="clientName" name="clientName" value="{{$review->client_name}}">
                        <input type="text" id="clientCompany" name="clientCompany" value="{{$review->client_company}}">
                        <input type="text" id="clientPosition" name="clientPosition" value="{{$review->client_position}}">
                        <input type="text" id="clientReview" name="clientReview" value="{{$review->review_body}}">
                        <input type="file" id="clientImage" name="clientImage" value="{{$review->client_image}}">

                        <input type="submit" value="<?=$review->id>0?'Update':'Create'?>" name="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection