@extends('blog.master')

@section('title', 'Contact US')
@section('contact-active', 'active')

@section('content')
    @include('blog.partials.hero', ['title' => 'Contact US'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4 col-lg-3 mb-md-0 mb-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>California United States</h3>
                            <p>Santa monica bullevard</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-md-8 col-lg-9">
                    @if (session('status'))
                        <section style="width: 80%;height: 20rem;align-content: center;margin: 10px auto;">
                            <div style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                                {{ session('status') }}
                            </div>
                        </section>
                    @else
                        <form method="POST" action="{{ route('contact.store') }}" class="form-contact contact_form" id="contactForm" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input class="form-control" name="first_name" id="first_name" type="text" placeholder="Enter your first name"
                                            value="{{ old('first_name') }}" required autofocus autocomplete="username">
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="last_name" id="last_name" type="text" placeholder="Enter your last name"
                                            value="{{ old('last_name') }}" required autocomplete="username">
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address"
                                            value="{{ old('email') }}" required autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject"
                                            value="{{ old('subject') }}" required autocomplete="subject">
                                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="7" placeholder="Enter Message"></textarea>
                                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-md-right mt-3 text-center">
                                <button type="submit" class="button button--active button-contactForm">Send Message</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
