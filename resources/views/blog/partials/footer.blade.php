<!--================ Start Footer Area =================-->
<section class="footer-area section-padding">
    <div style="max-width: 105rem" class="container">
        <div class="row">
            <!-- About Us -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                        At Sensive, we are your trusted source for fresh engaging stories. Whether you’re looking
                        for the latest insights in business, food reviews, or travel recommendations, Sensive offers
                        something for everyone.
                    </p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                @if (session('footer-status'))
                    <div
                        style="font-size: 18px; border: 1px solid #ff9907; padding: 10px 20px; text-align: center; border-radius: 9px;">
                        {{ session('footer-status') }}
                    </div>
                @else
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>

                        <form method="POST" action="{{ route('subscribe.footer.store') }}" novalidate
                            class="form-group mt-30">
                            @csrf
                            <div class="d-flex flex-row">
                                <input name="email" type="email" class="form-control mr-2" id="inlineFormInputGroup"
                                    placeholder="Enter email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}" required autocomplete="username">

                                <button type="submit" class="click-btn btn btn-default"><span
                                        class="lnr lnr-arrow-right"></span></button>
                            </div>

                            {{-- beginner solution for named error bag --}}
                            @if (session('requestUri') == '/subscribe/footer/store')
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            @endif
                        </form>

                    </div>
                @endif
            </div>

            <!-- Contact Us -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Contact Us</h6>
                    <p>
                        56/8, bir uttam qazi nuruzzaman road, <br>
                        mogbazar, Dhaka-1217
                    </p>
                    <p class="number">
                        +20 1234567890 <br>
                    </p>
                </div>
            </div>

            <!-- Follow Us -->
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-dribbble"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-behance"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Footer Area =================-->
