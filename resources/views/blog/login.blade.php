@extends('blog.master')
@section('title', 'Login')

@section('content')
    @include('blog.partials.hero', ['title' => 'Login'])

    <!-- ================ login section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form method="POST" action="{{ route('login') }}" class="form-contact contact_form" id="contactForm" novalidate="novalidate">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address" value="{{ old('email') }}"
                                required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <input class="form-control border" name="password" id="password" type="password" placeholder="Enter your password" required
                                autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Login -->
                        <div class="form-group text-md-right mt-3 text-center">
                            <a href="{{ route('register') }}" class="text-decoration-none mr-2">
                                <small class="text-muted">New to Sensive?
                                    <strong class="text-primary ml-0.5">Register here</strong>
                                </small>
                            </a>
                            <button type="submit" class="button button--active button-contactForm">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ login section end ================= -->
@endsection
