@extends('blog.master')
@section('title', 'Add a new blog post')

@section('content')
    @include('blog.partials.hero', ['title' => 'Add a new blog post'])

    <!-- ================ Create blog section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <!-- Go back navigation -->
                    <div class="mb-4">
                        <a href="{{ route('blog.index') }}" class="nav-link-form">Go Back</a>
                    </div>

                    @if (session('storeBlogSuccess'))
                        <div style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('storeBlogSuccess') }}
                        </div>
                    @elseif(session('storeBlogFail'))
                        <div style="font-size: 18px; border: 1px solid #3b3a3a; color: red; padding: 10px 20px; text-align: center; border-radius: 9px;">
                            {{ session('storeBlogSuccess') }}
                        </div>
                    @else
                        <!-- Create blog post -->
                        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data"
                              id="create_post" novalidate>
                            @csrf

                            <!-- Blog title -->
                            <div class="mb-4">
                                <label for="name" class="form-label fs-5 text-secondary fw-bold">Blog title</label>
                                <input type="text" class="form-control" name="name" id="name" required autofocus
                                       autocomplete="title" value="{{ old('name') }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description"
                                       class="form-label fs-5 text-secondary fw-bold">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5"
                                          class="form-control">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                            </div>

                            <!-- Select category -->
                            <div class="mb-4">
                                <label for="category" class="form-label fs-5 text-secondary fw-bold">Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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

                            <button type="submit" class="btn w-100 button button--active button-contactForm mt-4">Create
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
