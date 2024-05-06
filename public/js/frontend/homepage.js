$(window).scroll(function(){
    if (window.pageYOffset >= 1) {
        if (!$(".header-main").hasClass("header-white")) {
            $(".header-main").addClass("header-white");
            $(".logo-not-fixed").hide();
            $(".logo-fixed").show();
        }
        ;
    } else {
        $(".header-main").removeClass("header-white");
        $(".logo-not-fixed").show();
        $(".logo-fixed").hide();
    }
});

let slidesLength = document.querySelectorAll(".main-swiper-slide-box");

swiper = new Swiper(".main-swiper-container", {
    spaceBetween: 0,
    autoplay: false,
    loop: false,
    speed: 1000,
    navigation: true,
    pagination: true,
    autoplay: {
        delay: 6000,
    },

    disableOnInteraction: false,

    allowTouchMove: slidesLength.length <= 1 ? true : false,


    speed: 2000,
    slidesPerView: 1,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        clickable: true,
        el: '.main-swiper-pagination',
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
});

var countSlideImage = $('.main-swiper-slide-box');
countSlideImage.length > 1 ?$(".main-swiper-buttons").show():$(".main-swiper-buttons").hide();;
countSlideImage.length > 1 ?$(".main-swiper-pagination").show():$(".main-swiper-pagination").hide();

EventsSwiper = new Swiper(".events-swiper-container", {
    spaceBetween: 0,
    autoplay: false,
    loop: false,
    speed: 1000,
    navigation: true,
    pagination: false,
    slidesPerView: 1,
    allowTouchMove: false,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
});

var eventsSlideCount = $('.events-swiper-slide-box');
eventsSlideCount.length > 1 ?$(".event-swiper-buttons").show():$(".event-swiper-buttons").hide();

PartnersSwiper = new Swiper(".partners-swiper-container", {
    spaceBetween: 32,
    autoplay: false,
    loop: false,
    speed: 500,
    navigation: true,
    pagination: false,
    slidesPerView: 4,
    navigation: {
        nextEl: '.partners-swiper-button-next',
        prevEl: '.partners-swiper-button-prev',
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },

    breakpoints: {
        0: {
            spaceBetween: 23,
            slidesPerView: 1.5,
        },

        575: {
            slidesPerView: 2.5,
        },

        1025: {
            slidesPerView: 4,
            spaceBetween: 32,
        }
    }
});

const slider = document.querySelector('.about-boxes');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});

slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
});

slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
});

slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) / 1;
    slider.scrollLeft = scrollLeft - walk;
});
