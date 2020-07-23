<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Controllers\Controller;

class AdminBlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();

        return view('dashboard', ['blogs' => $blogs]);
    }

    public function create(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if($request->id!=null){
            $blog = Blog::findOrFail($request->id);
        }
        else{
            $blog = new Blog;
        }

        $blog->page_title = $request->pageTitle;
        $blog->page_description = $request->pageDescription;
        $blog->banner_title = $request->bannerTitle;
        $blog->banner_text = $request->bannerText;
        $blog->banner_slug = $request->bannerSlug;
        $blog->banner_slug_text = $request->bannerSlugText;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->publish_status = $request->publish=='on';
        $blog->trending_status = $request->trending=='on';
        $blog->main_status = $request->main=='on';

        if($request->file('image')!=null){
            $path = $request->file('image')->store('images');

            $blog->image = $path;
            $blog->image_title = $request->imageTitle;
            $blog->image_alt = $request->imageAlt;
        }

        $blog->save();

        return redirect('dashboard');

    }

    public function createIndex(){
        return view('blog-creation',['blog'=>new Blog]);
    }

    public function edit($id){
        $blog = Blog::findOrFail($id);

        return view('blog-creation', ['blog'=>$blog]);
    }

    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('dashboard');
    }

    public function publish($id){
        $blog = Blog::findOrFail($id);
        $blog->publish_status = 1;

        $blog->save();

        return redirect('dashboard');
    }

    public function unpublish($id){
        $blog = Blog::findOrFail($id);
        $blog->publish_status = 0;

        $blog->save();

        return redirect('dashboard');
    }

    public function trend($id){
        $blog = Blog::findOrFail($id);
        $blog->trending_status = 1;

        $blog->save();

        return redirect('dashboard');
    }

    public function untrend($id){
        $blog = Blog::findOrFail($id);
        $blog->trending_status = 0;

        $blog->save();

        return redirect('dashboard');
    }

    public function main($id){
        $blog = Blog::findOrFail($id);
        $blog->main_status = 1;

        $blog->save();

        return redirect('dashboard');
    }

    public function unmain($id){
        $blog = Blog::findOrFail($id);
        $blog->main_status = 0;

        $blog->save();

        return redirect('dashboard');
    }

}
