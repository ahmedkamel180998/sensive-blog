@php
    $categories = App\Models\Category::get();
@endphp
        <!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="box_1620 container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('blog.index') }}"><img
                            src="{{ asset('assets/img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-collapse offset collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-active')">
                            <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
                        </li>
                        <li class="nav-item submenu dropdown @yield('categories-active')">
                            <a href="{{ route('blog.index') }}" class="nav-link dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-haspopup="true"
                               aria-expanded="false">Categories</a>
                            @if (count($categories) > 0)
                                <ul class="dropdown-menu">
                                    @foreach ($categories as $category)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{ route('blog.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li class="nav-item @yield('contact-active')">
                            <a class="nav-link" href="{{ route('blog.contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Add new blog -->
                    @if (Auth::check())
                        <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary mr-2">Add New</a>
                    @endif
                    <!-- End - Add new blog -->

                    <!-- Show Logged user avatar -->
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        @if (Auth::check())
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="btn dropdown-toggle d-flex align-items-center" data-toggle="dropdown"
                                   role="button" aria-haspopup="true"
                                   aria-expanded="false">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mr-2 text-white"
                                         style="width: 32px; height: 32px; font-size: 14px;">
                                        {{ strtoupper(Auth::user()->name[0]) }}
                                    </div>
                                    <span class="font-weight-bold"
                                          style="font-size: 20px; color: #007bff">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li
                                            class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.myBlogs') }}">My
                                            Blogs</a>
                                    </li>
                                    <li class="nav-item">
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <a class="nav-link" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @endif
                    </ul>
                    <!-- End show Logged user avatar -->
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->
