@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
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
                    <form method="POST" action="{{ route('blog-creation') }}" style="margin: 20px 20px;" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$blog->id}}">
                        <input type="text" id="pageTitle" name="pageTitle" value="{{$blog->page_title}}">
                        <input type="text" id="pageDescription" name="pageDescription" value="{{$blog->page_description}}">
                        <input type="text" id="bannerTitle" name="bannerTitle" value="{{$blog->banner_title}}">
                        <input type="text" id="bannerText" name="bannerText" value="{{$blog->banner_text}}">
                        <input type="text" id="bannerSlug" name="bannerSlug" value="{{$blog->banner_slug}}">
                        <input type="text" id="bannerSlugText" name="bannerSlugText" value="{{$blog->banner_slug_text}}">
                        <input type="text" id="title" name="title" value="{{$blog->title}}">
                        <input type="text" id="slug" name="slug" value="{{$blog->slug}}">
                        <input type="text" id="content" name="content" value="{{$blog->content}}">
                        <input type="file" id="image" name="image" value="{{$blog->image}}">
                        <input type="text" id="imageTitle" name="imageTitle" value="{{$blog->image_title}}">
                        <input type="text" id="imageAlt" name="imageAlt" value="{{$blog->image_alt}}">
                        <input type="checkbox" id="publish" name="publish" value="publish" <?=$blog->publish_status==1?'checked':''?>>
                        <label for="publish">Published</label>
                        <input type="checkbox" id="trending" name="trending" value="trending" <?=$blog->trending_status==1?'checked':''?>>
                        <label for="trending">Trending</label>
                        <input type="checkbox" id="main" name="main" value="main" <?=$blog->main_status==1?'checked':''?>>
                        <label for="main">Main</label>

                        <input type="submit" value="<?=$blog->id>0?'Update':'Create'?>" name="Submit" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection