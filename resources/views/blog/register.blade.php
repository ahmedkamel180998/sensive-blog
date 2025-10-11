@extends('blog.master')

@section('content')
    @include('blog.partials.hero', ['title' => 'Register'])

    <!-- ================ register section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('register') }}" class="form-contact contact_form" id="contactForm"
                        novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <!-- Name -->
                                <div class="form-group">
                                    <input class="form-control border" name="name" id="name" type="text"
                                        placeholder="Enter your name" required autofocus autocomplete="name"
                                        value="{{ old('name') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="form-group">
                                    <input class="form-control border" name="email" id="email" type="email"
                                        placeholder="Enter email address" required autocomplete="username"
                                        value="{{ old('email') }}">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- Password -->
                                <div class="form-group">
                                    <input class="form-control border" name="password" id="password" type="password"
                                        placeholder="Enter your password" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <input class="form-control border" name="password_confirmation"
                                        id="password_confirmation" type="password"
                                        placeholder="Enter your password confirmation" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <!-- Register -->
                        <div class="form-group text-md-right mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none mr-2">
                                <small class="text-muted">Already registered?
                                    <strong class="text-primary ml-0.5">Login here</strong>
                                </small>
                            </a>
                            <button type="submit" class="button button--active button-contactForm">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ register section end ================= -->
@endsection
