<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{   
    //maybe i shall use them in scopes?

    public function getMainBlog(){
        return $this::where('main_status', 1)
                    ->where('publish_Status', 1)
                    ->orderBy('id', 'desc')
                    ->take(1)
                    ->get(['id', 'title', 'slug', 'image', 'image_title', 'image_alt', 'content', 'page_title', 'page_description', 'publish_status', 'trending_status', 'main_status', 'created_at']);
    }

    public function getRecentBlogs($limit = 6, $offset = 0){
        return $this::where('publish_status', 1)
                    ->where('main_status', 0)
                    ->orderBy('id', 'desc')
                    ->skip($offset)
                    ->take($limit)
                    ->get(['id', 'title', 'slug', 'image', 'content', 'page_description', 'publish_status', 'trending_Status', 'main_status', 'created_at', ]);
    }

    public function getTrendingBlogs($except_id = 0){
        return $this::where('publish_status', 1)
                    ->where('trending_status', 1)
                    ->where('id', '!=', $except_id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get(['id', 'title', 'slug', 'content', 'image', 'page_description', 'created_at']);
    }

    public function getRelatedBlogs(){
        //
    }

    public function findBySlug($slug){
        return $this::where('slug', $slug)->get();
    }

    public function getAllBlogsCount($publish = false){

        if($publish){
            return $this::where('publish_status', 1)->where('main_status', '!=', 1)->get(['id'])->count();
        }

        return $this::where('main_status', '!=', 1)->get(['id'])->count();
    }
}
