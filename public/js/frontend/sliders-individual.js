individualPagesSlider = new Swiper(".individual-page-slider", {
    autoplay: false,
    loop: false,
    speed: 500,
    navigation: true,
    pagination: false,
    slidesPerView: 3,
    navigation: {
        nextEl: '.individual-page-swiper-button-next',
        prevEl: '.individual-page-swiper-button-prev',
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },

    breakpoints: {
        0: {
            spaceBetween: 16,
            slidesPerView: 1.26,
        },

        575: {
            slidesPerView: 1.5,
        },

        767: {
            slidesPerView: 2.5,
        },

        1025: {
            slidesPerView: 3,
            spaceBetween: 30,
        }
    }
});
