$(".input-password-img").click(function (e) {
    e.preventDefault();
    var type = $(".input-password").attr('type');
    switch (type) {
        case 'password': {
            $(".input-password").attr('type', 'text');
            return;
        }
        case 'text': {
            $(".input-password").attr('type', 'password');
            return;
        }
    }
});

$(".input-password-img-2").click(function (e) {
    e.preventDefault();
    var type = $(".input-password-2").attr('type');
    switch (type) {
        case 'password': {
            $(".input-password-2").attr('type', 'text');
            return;
        }
        case 'text': {
            $(".input-password-2").attr('type', 'password');
            return;
        }
    }
});
