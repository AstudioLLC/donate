$(document).ready(function () {
    if ($(window).width() >= 1025) {
        $(".header-nav-ul-li").mouseenter(function () {
            $(this).children(".header-dropdown-list-wrap").css({
                "opacity": "1",
                "visibility": "visible",
                "transition": "0s all",
            });
            $(this).children("a").addClass("F36C21");
        }).mouseleave(function () {
            $(this).children(".header-dropdown-list-wrap").css({
                "opacity": "0",
                "visibility": "hidden",
                "transition": "0.3s all",
            });
            $(this).children("a").removeClass("F36C21");
        });
    }
});
$(document).resize(function () {
    if ($(window).width() >= 1025) {
        $(".header-nav-ul-li").mouseenter(function () {
            $(this).children(".header-dropdown-list-wrap").css({
                "opacity": "1",
                "visibility": "visible",
                "transition": "0s all",
            });
            $(this).children("a").addClass("F36C21");
        }).mouseleave(function () {
            $(this).children(".header-dropdown-list-wrap").css({
                "opacity": "0",
                "visibility": "hidden",
                "transition": "0.3s all",
            });
            $(this).children("a").removeClass("F36C21");
        });
        $(".dropdown-item.active").addClass("d-none");
    }
})
window.onscroll = function () {
    scrollFunction();
}
;
$(".hamburger").click(function () {
    $("body").addClass("menu-scroll-lock");
    $(".mobile-header-detail-modal-wrap").addClass("mobile-header-detail-wrap-active");
    if ($('.header-nav-ul-li').hasClass("header-nav-ul-li-opened")) {
        $('.header-nav-ul-li').removeClass("header-nav-ul-li-opened");
    }
})
$(".close-profile-detail-modal-click").click(function () {
    $("body").removeClass("menu-scroll-lock");
    $(".profile-detail-modal-wrap").removeClass("profile-detail-modal-wrap-active");
})
$(".menu-close").click(function () {
    $("body").removeClass("menu-scroll-lock");
    $(".mobile-header-detail-modal-wrap").addClass("mobile-header-detail-wrap-inactive");
    $(".mobile-header-detail-modal-wrap").removeClass("mobile-header-detail-wrap-active");
    setTimeout("$(\".mobile-header-detail-modal-wrap\").removeClass(\"mobile-header-detail-wrap-inactive\");", 200);
});
$(".search-open").click(function () {
    $(".search-block").addClass("search-block-opened");
});
$(".search-form-close").click(function () {
    $(".search-block").removeClass("search-block-opened");
    document.querySelector(".search-input").value = "";
});
$(".profile-fundraiser-link").click(function () {
    $(this).toggleClass("active");
    $(".fundraiser-menu").toggleClass("active");
})
$(document).mouseup(function (e) {
    let menu = $(".mobile-header-modal");
    if (!menu.is(e.target) && menu.has(e.target).length === 0) {
        $("body").removeClass("menu-scroll-lock");
        $(".mobile-header-detail-modal-wrap").removeClass("mobile-header-detail-wrap-active");
    }
    ; let profile = $(".left-panel-profile");
    if (!profile.is(e.target) && profile.has(e.target).length === 0) {
        $("body").removeClass("menu-scroll-lock");
        $(".profile-detail-modal-wrap").removeClass("profile-detail-modal-wrap-active");
    }
    ;
});
mybutton = document.getElementById("btn-top");
function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        mybutton.style.display = "flex";
    } else {
        mybutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
$(".amount-amd-text").click(function () {
    $(this).toggleClass("amount-amd-text-active");
    $(this).siblings(".amount-amd-text").removeClass("amount-amd-text-active");
});
if ($(".dropdown-item").hasClass("active")) {
    let mytext = document.querySelector(".text-span");
    let y = document.querySelector(".dropdown-item.active").innerText;
    mytext.textContent = y;
    $(this).hide();
}
; if ($(window).width() >= 1025) {
    $(".dropdown-item.active").addClass("d-none");
} else {
    $(".dropdown-item.active").addClass("d-block");
}
$(window).resize(function () {
    if ($(window).width() >= 1025) {
        $(".dropdown-item.active").removeClass("d-block");
        $(".dropdown-item.active").addClass("d-none");
    }
    if ($(window).width() <= 1024) {
        $(".dropdown-item.active").removeClass("d-none");
        $(".dropdown-item.active").addClass("d-block");
    }
})
$(".other-btn_click").click(function () {
    $(".other-amount-input").removeClass("d-none")
})
$(".other_input_cross").click(function () {
    $(".other-amount-input").addClass("d-none")
    $(".input-default").val(" ")
})
$(".sponsor-card-click").click(function () {
    $("body").addClass("sponsor-card-scroll")
})
$(".donate-modal-white").click(function (event) {
    event.stopPropagation();
})
$(".close-videos-gallerys-block, .btn-orange-close, .donate-modal").click(function () {
    $("body").removeClass("sponsor-card-scroll");
})
$(".open-card-details, .button-orange-gift").click(function () {
    $(this).parents('.sponsor-card').siblings('.sponsor-card-bottom').toggleClass("open_block");
});

let mainAchievementSection = document.querySelector('.main-achievement-section');
if (mainAchievementSection) {
    const mainAchievementSlide = new Swiper(".main-achievement-slide", {
        spaceBetween: 20,
        autoplay: false,
        loop: false,
        speed: 600,
        parallax: true,
        slidesPerView: 3,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".main-achievement-slide__next",
            prevEl: ".main-achievement-slide__prev",
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 8,
            },
            420: {
                slidesPerView: 1.5,
                spaceBetween: 8,
            },
            575: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            767: {
                slidesPerView: 2.5,
                spaceBetween: 10,
            },
            1025: {
                slidesPerView: 3,
                spaceBetween: 20,
            }
        }
    });
}

if (mainAchievementSection) {
    const mainAchievementGallerySlide = new Swiper(".main-achievement-gallery-slide", {
        autoplay: false,
        loop: false,
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".main-achievement-gallery-slide__next",
            prevEl: ".main-achievement-gallery-slide__prev",
        },
    });
}

if (mainAchievementSection) {
    const mainAchievementVideoSlide = new Swiper(".main-achievement-video-slide", {
        autoplay: false,
        loop: false,
        speed: 600,
        parallax: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".main-achievement-video-slide__next",
            prevEl: ".main-achievement-video-slide__prev",
        },
    });
}

if (mainAchievementSection) {
    const mainAchievementHistorySlide = new Swiper(".main-achievement-history-slide", {
        autoplay: false,
        loop: false,
        speed: 600,
        parallax: true,
        spaceBetween: 20,
        slidesPerView: 3.5,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".main-achievement-history-slide__next",
            prevEl: ".main-achievement-history-slide__prev",
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
                spaceBetween: 8,
            },
            420: {
                slidesPerView: 1.8,
                spaceBetween: 8,
            },
            575: {
                slidesPerView: 2.5,
                spaceBetween: 10,
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            1025: {
                slidesPerView: 3.5,
                spaceBetween: 20,
            }
        }
    });
}
