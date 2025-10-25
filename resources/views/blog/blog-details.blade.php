@extends('blog.master')

@section('content')
    @include('blog.partials.hero', ['title' => $blog->name])

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        @if($blog && $blog->image_public_id)
                            <!--suppress BladeUnknownComponentInspection -->
                            <x-cld-image
                                    public-id="{{ $blog->image_public_id }}"
                                    :alt="$blog->name"
                                    width="80"
                                    height="80"
                                    class="img-fluid"
                                    loading="lazy">
                            </x-cld-image>
                        @elseif($blog->image_url)
                            <img src="{{ $blog->image_url }}"
                                 alt="{{ $blog->name }}"
                                 width="80"
                                 height="80"
                                 class="img-fluid"
                                 loading="lazy">
                        @else
                            <div class="placeholder-image"
                                 style="width: 80px; height: 80px; background: #e0e0e0;"></div>
                        @endif
                        <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                            <h4>{{ $blog->name }}</h4>
                        </a>
                        <div class="user_details">
                            <div class="mt-sm-0 float-right mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $blog->user->name }}</h5>
                                        <p>{{ $blog->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42"
                                             src="{{ $user->avatar ?? asset("assets/img/avatar.png") }}"
                                             alt="user avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{{ $blog->description }}</p>
                    </div>

                    @if($blog->comments()->count() > 0)
                        <div class="comments-area">
                            <h4>{{$blog->comments()->count()}} Comments</h4>
                            @foreach($blog->comments as $comment)
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{ asset('assets/img/avatar.png') }}" width="50px"
                                                     alt="avatar.png">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{$comment->name}}</a></h5>
                                                <p class="date">{{$comment->created_at->format('M d Y')}}</p>
                                                <p class="comment">
                                                    {{$comment->message}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="comment-form">
                        @if(session('storeCommentSuccess'))
                            <div class="alert alert-success">
                                {{ session('storeCommentSuccess') }}
                            </div>
                        @elseif(session('storeCommentError'))
                            <div class="alert alert-danger">
                                {{ session('storeCommentError') }}
                            </div>
                        @else
                            @if(!auth()->check())
                                @php
                                    // Store the current URL in the session as the intended URL
                                    session()->put('redirect', url()->current());
                                @endphp
                                <a href="{{ route('login') }}" class="button submit_btn">
                                    Login first to comment
                                </a>
                            @else
                                <h4>Leave a Reply</h4>
                                <form class="form-contact comment_form"
                                      action="{{route('comment.store')}}"
                                      method="POST"
                                      id="commentForm"
                                      novalidate>
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <div class="2 form-inline">
                                        <div class="form-group col-lg-6 col-md-6 name">
                                            <input type="text" class="form-control" id="name"
                                                   placeholder="Enter Name"
                                                   onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Enter Name'" required
                                                   name="name"
                                                   value="{{ auth()->user()->name }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 email">
                                            <input type="email" class="form-control" id="email"
                                                   placeholder="Enter email address" onfocus="this.placeholder = ''"
                                                   onblur="this.placeholder = 'Enter email address'" required
                                                   name="email"
                                                   value="{{ auth()->user()->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                                               name="subject" value="{{old('subject')}}"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Subject'" required>
                                        <x-input-error :messages="$errors->get('subject')" class="mt-2"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="message"
                                                  placeholder="Message"
                                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'"
                                                  required="">{{old('message')}}</textarea>
                                        <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                                    </div>
                                    <button type="submit" class="button submit_btn">Post Comment</button>
                                    @endif
                                </form>
                            @endif
                    </div>
                </div>

                <!-- Start Blog Post Sidebar -->
                @include('blog.partials.sidebar')
                <!-- End Blog Post Sidebar -->
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
