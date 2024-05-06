$(".modal-thank-you-btn").click(function (){
    $(".thank-you").addClass("donate-modal-opened");
});

$(".modal-fundraiser-btn").click(function (){
    $(".fundraiser").addClass("donate-modal-opened");
});

$(".modal-fundraiser-button-2").click(function (){
    $(".fundraiser2").addClass("donate-modal-opened");
});

$(".modal-corporate-btn").click(function (){
    $(".corporate-partnership-donate").addClass("donate-modal-opened");
});

$(".modal-reports-btn").click(function (){
    $(".reports-modal").addClass("donate-modal-opened");
});

$(".btn-orange-close").click(function(){
    $(this).closest(".donate-modal").removeClass("donate-modal-opened");
})

$(".fundraiser-button-2").click(function(){
    $(this).closest(".donate-modal").removeClass("donate-modal-opened");
});
$(".donate-modal-close").click(function (){
    $(".donate-modal").removeClass("donate-modal-opened");
});



$(document).mouseup(function (e) {
    let thankYouBtn = $(".donate-modal-btn");
    let thankYou = $(".donate-modal-white");

    if ((!thankYouBtn.is(e.target) && thankYouBtn.has(e.target).length === 0) && (!thankYou.is(e.target) && thankYou.has(e.target).length === 0)) {
        $(".donate-modal").removeClass("donate-modal-opened");
    };
});
