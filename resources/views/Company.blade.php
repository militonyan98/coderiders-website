@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company') }}</div>
                
                <div>
                    
                    @foreach ($recent_blogs as $recentBlog)
                        <div class="container" style="margin: 20px 20px; width:auto;">
                            <div class="card">
                                <div><?=$recentBlog->title?></div>
                                <div><?=$recentBlog->slug?></div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection