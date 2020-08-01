<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index(){
        $recent_blogs = Blog::getByCount(2);
        
        return view('Company', ['recent_blogs' => $recent_blogs]);
    }
}
