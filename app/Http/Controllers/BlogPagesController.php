<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPagesController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(1);
        return view('blog.index', compact('blogs'));
    }

    public function category()
    {
        return view('blog.category');
    }

    public function contact()
    {
        return view('blog.contact');
    }

    public function blogDetails()
    {
        return view('blog.blog-details');
    }

    public function login()
    {
        return view('blog.login');
    }

    public function register()
    {
        return view('blog.register');
    }
}
