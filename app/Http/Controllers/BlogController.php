<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'userBlogs']);
    }

    public function userBlogs()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your blogs.');
        }
        $blogs = Blog::where('user_id', $user->id)->paginate(10);
        return view('blog.my-blogs', compact('blogs'));
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
            $cloudinaryImage = $request->file('image')?->storeOnCloudinary('sensive-blog/posts');

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
        return view('blog.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            $categories = Category::get();
            return view('blog.post.edit', compact('categories', 'blog'));
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            try {
                $validated = $request->validated();

                if ($request->hasFile('image')) {
                    // Upload to Cloudinary (this can fail)
                    $cloudinaryImage = $request->file('image')?->storeOnCloudinary('sensive-blog/posts');

                    // Remove image and add Cloudinary data
                    unset($validated['image']);

                    $validated = array_merge($validated, [
                        'image_url' => $cloudinaryImage->getSecurePath(),
                        'image_public_id' => $cloudinaryImage->getPublicId(),
                    ]);
                }

                // Create the blog post
                $blog->update($validated);

                return back()->with('updateBlogSuccess', 'Blog updated successfully!');
            } catch (\Exception $e) {
                return back()->with('updateBlogFail', 'Failed to update blog. Please try again.');
            }
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id === Auth::user()->id) {
            try {
                $blog->delete();
                return back()->with('deleteBlogSuccess', 'Blog deleted successfully!');
            } catch (\Exception $e) {
                return back()->with('deleteBlogFail', 'Failed to delete blog. Please try again.');
            }
        }
        abort(403, 'Unauthorized action.');
    }
}
