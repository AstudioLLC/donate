const swiper = new Swiper('.profile-swiper', {
    direction: 'horizontal',
    loop: false,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    spaceBetween: 5,

    navigation: true,

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

const fundraiserSwiper = new Swiper('.fundraiser-swiper', {
    // direction: 'vertical',
    loop: true,

    pagination: {
        el: '.swiper-paginations',
    },

    spaceBetween: 5,

    navigation: false,
    // navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    // },

    scrollbar: {
        el: '.swiper-scrollbar',
    },
});
