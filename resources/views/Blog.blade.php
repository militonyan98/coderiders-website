@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | Blogs') }}</div>
                
                <div>
                    <div><?=$page_title?></div>
                    <div><?=$page_description?></div>
                    @if (count($main_blog)!=0)
                        <div><?=$main_blog[0]->content?></div>
                    @endif
                    @foreach ($recent_blogs as $recentBlog)
                        <div class="container" style="margin: 20px 20px; width:auto;">
                            <div class="card">
                                <div><?=$recentBlog->id?></div>
                                <div><?=$recentBlog->title?></div>
                                
                            </div>
                        </div>
                    @endforeach
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