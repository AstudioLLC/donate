individualPagesSlider = new Swiper(".care-center-slider", {
    autoplay: false,
    loop: false,
    speed: 500,
    navigation: true,
    pagination: false,
    slidesPerView: 1,
    navigation: {
        nextEl: '.center-slider-button-next',
        prevEl: '.center-slider-button-prev',
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
});
