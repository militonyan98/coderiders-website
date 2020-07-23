@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | Blogs') }}</div>
                
                <div>
                    @foreach ($blogs as $blog)
                    <div class="container" style="margin: 20px 20px; width:auto;">
                        <div class="card">
                            <div><?=$blog->id?></div>
                            <div><?=$blog->page_title?></div>
                            
                            <div class="col-md- offset-md-5" style="margin-bottom: 5px;">
                                <a value="Edit" class="btn btn-primary" href="{{ route('edit', $blog->id) }}">Edit</a>
                                <a value="Delete" class="btn btn-danger" href="{{ route('delete', $blog->id) }}">Delete</a>
                            
                                <a value="" class="btn btn-secondary" href="<?=$blog->publish_status==1?route('unpublish',$blog->id):route('publish',$blog->id)?>"><?=$blog->publish_status==1?'Unpublish':'Publish'?></a>
                                <a value="" class="btn btn-secondary" href="<?=$blog->trending_status==1?route('untrend',$blog->id):route('trend',$blog->id)?>}"><?=$blog->trending_status==1?'Untrend':'Trend'?></a>
                                <a value="" class="btn btn-secondary" href="<?=$blog->main_status==1?route('unmain',$blog->id):route('main',$blog->id)?>}"><?=$blog->main_status==1?'Unmain':'Main'?></a>
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