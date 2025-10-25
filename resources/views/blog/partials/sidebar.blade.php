@php
    $categories = App\Models\Category::get();
    $latestBlogs = App\Models\Blog::latest()->take(3)->get();
@endphp
        <!-- Start Blog Post Sidebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <!-- Newsletter -->
        <div class="single-sidebar-widget newsletter-widget">
            @if (session('status'))
                <div style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                    {{ session('status') }}
                </div>
            @else
                <form method="POST" action="{{ route('subscribe.sidebar.store') }}" novalidate>
                    @csrf
                    <h4 class="single-sidebar-widget__title">Newsletter</h4>
                    <div class="form-group mt-30">
                        <div class="col-autos">
                            <input name="email" type="email" class="form-control" id="newsletterFormInput"
                                   placeholder="Enter email" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}" required
                                   autofocus autocomplete="username">

                            {{-- beginner solution for named error bag --}}
                            @if (session('requestUri') === '/subscribe/sidebar/store')
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="bbtns d-block w-100 mt-20">Subscribe</button>
                </form>
            @endif
        </div>

        <!-- Category -->
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Category</h4>
            @if (count($categories) > 0)
                <ul class="cat-list mt-20">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('blog.category', ['id' => $category->id]) }}"
                               class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                    <?php $categoryBlogsCount = $category->blogs->count(); ?>
                                <p>({{ $categoryBlogsCount?: 0 }})</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Recent Posts -->
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Posts</h4>
            <div class="popular-post-list">
                @if (count($latestBlogs) > 0)
                    @foreach($latestBlogs as $blog)
                        <div class="single-post-list">
                            <div class="thumb">
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    <!--suppress BladeUnknownComponentInspection -->
                                    <x-cld-image public-id="{{ $blog->image_public_id }}" alt="{{ $blog->name }}"
                                                 width="80"
                                                 height="80"
                                                 class="img-fluid">
                                    </x-cld-image>
                                    <ul class="thumb-info">
                                        <li>{{ $blog->user->name }}</li>
                                        <li>{{ $blog->created_at->format('M d y h:I') }}</li>
                                    </ul>
                                </a>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    <h6>{{ $blog->name }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No blogs found.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
