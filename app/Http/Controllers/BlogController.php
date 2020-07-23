<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog as BlogModel;

class BlogController extends Controller
{
    public function index(){
        $blog = new BlogModel;

        $pageTitle = 'Custom Software Development Company Blog | CodeRiders';
        $pageMetaDescription = 'The latest research-driven software development articles and news on web development and design, custom software development, software outsource, etc.';
        $mainBlog = $blog->getMainBlog();
        $recentBlogs = $blog->getRecentBlogs();
        $trendingBlogs = $blog->getTrendingBlogs();

        return view('Blog',['page_title'=>$pageTitle, 
                            'page_description'=>$pageMetaDescription, 
                            'main_blog'=>$mainBlog, 
                            'recent_blogs'=>$recentBlogs, 
                            'trending_blogs'=>$trendingBlogs]);
    }

    public function show($slug){
        $blog = new BlogModel;

        $target_blog = $blog->findBySlug($slug);
        if(empty($target_blog)){
            abort(404);
        }

        $target_blog = $target_blog[0];

        $trending_blogs = $blog->getTrendingBlogs($target_blog['id']);
        // $related_blogs  = $blog->findRelatedBlogs($target_blog['id']);

        return view('BlogInner', ['target_blog' => $target_blog, 'trending_blogs' => $trending_blogs]);
    }

    public function load(Request $request){
        
        $response = array();
        $has_next_page = true;

        if(!($request->offset>0)){
            $response['code'] = 404;
            return response()->json($response);
        }
        $current_offset = $request->offset;
        $next_offset = $current_offset + 2;

        $blog = new BlogModel;

        $all_blogs_count = $blog->getAllBlogsCount(true);
        $recent_blogs = $blog->getRecentBlogs(2, $current_offset);

        if($next_offset >= $all_blogs_count) {
            $has_next_page = false;
        }

        if(!empty($recent_blogs)) {
            foreach ($recent_blogs as $key => $value) {
                $date = date_create($value['created_at']);
                $date = date_format($date,"d.m.Y");

                $content = strip_tags($value['content']);
                $need_to_split = 200;
                $content = substr($content, 0, $need_to_split)."...";

                $recent_blogs[$key]['created_at'] = $date;
                $recent_blogs[$key]['content'] = $content;
                $recent_blogs[$key]['twitter_link']  = $this->generateTwitterLink($value['slug']);
                $recent_blogs[$key]['facebook_link'] = $this->generateFacebookLink($value['slug']);
                $recent_blogs[$key]['linkedin_link'] = $this->generateLinkedInLink($value['slug'], $value['title'], $value['page_description']);
                $recent_blogs[$key]['google_link']   = $this->generateGooglePlusLink($value['slug']);
            }

            $response['blogs']  = $recent_blogs;
            $response['code'] = 200;
            $response['has_next_page'] = $has_next_page;
            $response['next_offset'] = $next_offset;
        } else {
            $response['code'] = 404;
        }

       return response()->json($response);

    }

    private function generateTwitterLink($slug) {
        return 'https://twitter.com/intent/tweet?url='.$this->generateBlogUrl($slug);
    }

    private function generateFacebookLink($slug) {
        return $this->url("/blog/{$slug}");
    }

    private function generateLinkedInLink($slug, $title, $description) {  
        return 
            'https://www.linkedin.com/shareArticlemini=true&url='
            .$this->generateBlogUrl($slug)
            .'&title='.urlencode($title)
            .'&summary='.urlencode($description)
            .'&source='.$this->generateBlogUrl($slug);
    }

    private function generateGooglePlusLink($slug) {
        return 'https://plus.google.com/share?url=' .$this->generateBlogUrl($slug);;
    }

    
    private function generateBlogUrl($slug){
        return url("/blog/{$slug}");
    }
}
