$(function () {
    "use strict";
    /*-------------------------------------------------------------------------------
      Navbar Fixed using Intersection Observer
    -------------------------------------------------------------------------------*/
    function initStickyNav() {
        const nav = document.querySelector(".header_area");
        const header = document.querySelector(".hero-banner"); // or your header element

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

    // Replace old navbarFixed() call with:
    initStickyNav();

    //------- mailchimp --------//
    function mailChimp() {
        $("#mc_embed_signup").find("form").ajaxChimp();
    }
    mailChimp();
});
