@php
    $categories = App\Models\Category::get();
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
                            <input name="email" type="email" class="form-control" id="newsletterFormInput" placeholder="Enter email" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}" required autofocus autocomplete="username">

                            {{-- beginner solution for named error bag --}}
                            @if (session('requestUri') == '/subscribe/sidebar/store')
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                            <a href="{{ route('blog.index') }}" class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                <p>(03)</p>
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
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb1.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Accused of assaulting flight attendant miktake alaways</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb2.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb3.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
