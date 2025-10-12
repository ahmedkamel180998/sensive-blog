<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('blog.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            $validated = $request->validated();

            // Upload to Cloudinary (this can fail)
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('sensive-blog/posts');

            // Remove image and add Cloudinary data
            unset($validated['image']);

            $validated = array_merge($validated, [
                'image_url' => $cloudinaryImage->getSecurePath(),
                'image_public_id' => $cloudinaryImage->getPublicId(),
                'user_id' => Auth::user()->id,
            ]);

            // Create the blog post
            Blog::create($validated);

            return back()->with('storeBlogSuccess', 'Blog created successfully!');
        } catch (\Exception $e) {
            return back()->with('storeBlogFail', 'Failed to create blog. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
