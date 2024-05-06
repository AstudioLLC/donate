const swiperius = new Swiper(".swiper-photos", {
    spaceBetween: 0,
    autoplay: false,
    loop: false,
    speed: 1000,
    navigation: true,

    slidesPerView: 1,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

const swiperius2 = new Swiper(".swiper-videos", {
    spaceBetween: 0,
    autoplay: false,
    loop: false,
    speed: 1000,
    navigation: true,

    slidesPerView: 1,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});



$(".open-photos").click(function(){
    $(".open-photos-class").show();
})

$(".close-videos-gallerys-block").click(function(){
    $(".open-photos-class").hide();
})

$(".open-videos").click(function() {
    $(".videos-photos-class").show();
    setIframeHeight();
})

$(".close-videos-gallerys-block").click(function(){
    $(".videos-photos-class").hide();
})

function setIframeHeight() {
    let videoWidth = $(".iframe-video-class").innerWidth();
    let videoHeight = videoWidth / 2;

    $(".iframe-video-class").css({
        "height": videoHeight,
    })
}

$(document).ready(function(){
    setIframeHeight();
})

$(window).on('resize', function(){
    setIframeHeight();
});

$(document).on('hidden.bs.modal', function () {
    $(".embed-responsive-item").each(function (index, iframe){
       $(iframe).attr("src", $(iframe).attr("src"));
    })
});
