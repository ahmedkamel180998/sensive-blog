<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
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
