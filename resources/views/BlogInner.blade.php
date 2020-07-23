@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | Blogs') }}</div>
                
                <div>
                    <div><?=$target_blog->title?></div>
                    <div><?=$target_blog->page_description?></div>
                    
                    @foreach ($trending_blogs as $trendingBlog)
                        <div class="container" style="margin: 20px 20px; width:auto;">
                            <div class="card">
                                <div><?=$trendingBlog->slug?></div>
                                <div><?=$trendingBlog->page_description?></div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection