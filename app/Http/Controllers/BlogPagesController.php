<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;

class BlogPagesController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);

        $latestBlogs = Blog::latest()->get();
        return view('blog.index', compact('blogs', 'latestBlogs'));
    }

    public function category($id)
    {
        $categoryName = Category::find($id)->name;
        $blogs = Blog::where('category_id', $id)->paginate(8);
        return view('blog.category', compact('categoryName', 'blogs'));
    }

    public function contact()
    {
        return view('blog.contact');
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
