@extends('blog.master')
@section('title', 'Edit Blog Post')

@section('content')
    @include('blog.partials.hero', ['title' => $blog->name])

    <!-- ================ Create blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <!-- Go back navigation -->
                    <div class="mb-4">
                        <a href="{{ route('blog.index') }}" class="nav-link-form">Go Back</a>
                    </div>

                    @if (session('updateBlogSuccess'))
                        <div style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('updateBlogSuccess') }}
                        </div>
                    @elseif(session('updateBlogFail'))
                        <div style="font-size: 18px; border: 1px solid #3b3a3a; color: red; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('updateBlogSuccess') }}
                        </div>
                    @else
                        <!-- Edit blog post -->
                        <form method="POST" action="{{ route('blogs.update', ['blog' => $blog]) }}"
                              enctype="multipart/form-data" id="create_post" novalidate>
                            @csrf
                            @method('PUT')

                            <!-- Blog title -->
                            <div class="mb-4">
                                <label for="name" class="form-label fs-5 text-secondary fw-bold">Blog title</label>
                                <input type="text" class="form-control" name="name" id="name" required autofocus
                                       autocomplete="title" value="{{ $blog->name }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description"
                                       class="form-label fs-5 text-secondary fw-bold">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                          class="form-control">{{ $blog->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                            </div>

                            <!-- Select category -->
                            <div class="mb-4">
                                <label for="category" class="form-label fs-5 text-secondary fw-bold">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if($category->id === $blog->category_id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                            </div>

                            <!-- Upload image -->
                            <div class="mb-4">
                                <label class="form-label fs-5 text-secondary fw-bold" for="image"></label>
                                <input class="form-control--file" type="file" name="image" id="image" required>
                                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                            </div>

                            <button type="submit" class="btn w-100 button button--active button-contactForm mt-4">Edit
                                Post
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Create blog section end ================= -->
@endsection
