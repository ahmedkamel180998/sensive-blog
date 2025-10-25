$(function () {
    "use strict";

    /*-------------------------------------------------------------------------------
      Navbar Fixed using Intersection Observer
    -------------------------------------------------------------------------------*/
    function initStickyNav() {
        const nav = document.querySelector(".header_area");
        const header = document.querySelector(".hero-banner");

        if (!nav || !header) return;

        const stickyNav = function (entries) {
            const [entry] = entries;
            if (!entry.isIntersecting) {
                nav.classList.add("navbar_fixed");
            } else {
                nav.classList.remove("navbar_fixed");
            }
        };

        const navHeight = nav.getBoundingClientRect().height;
        const stickyOptions = {
            root: null,
            threshold: 0,
            rootMargin: `-${navHeight}px`,
        };

        const headerObserver = new IntersectionObserver(
            stickyNav,
            stickyOptions
        );
        headerObserver.observe(header);
    }

    initStickyNav();

    /*-------------------------------------------------------------------------------
      Owl Carousel - Blog Slider
    -------------------------------------------------------------------------------*/
    if ($('.blog-slider').length) {
        $('.blog-slider').owlCarousel({
            loop: true,
            margin: 30,
            items: 3,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed: 1500,
            dots: true,
            responsiveClass: true,
            navText: [
                "<div class='blog-slider__leftArrow'><img src='/assets/img/home/left-arrow.png' alt='left-arrow'></div>",
                "<div class='blog-slider__rightArrow'><img src='/assets/img/home/right-arrow.png' alt='right-arrow'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    }

    /*-------------------------------------------------------------------------------
      Mailchimp
    -------------------------------------------------------------------------------*/
    function mailChimp() {
        $("#mc_embed_signup").find("form").ajaxChimp();
    }

    mailChimp();
});