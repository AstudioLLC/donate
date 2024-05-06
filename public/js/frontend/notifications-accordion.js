$(".donation-box").click(function(){
    $(this).find($(".notification-content-accordion")).toggle(200);

    $(this).find($(".read-more")).toggle();

    $(this).find($(".read-less")).toggle();
});
