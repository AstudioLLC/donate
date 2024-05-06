



<!DOCTYPE html>
<html>
<head>
    <title>Donate.am</title>
</head>
<body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        font-size: 1.1em;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 1.5rem!important;
        /*border: 1px solid #F86A04;*/
        border-radius: 50px;
        box-shadow: 0 19px 38px rgb(0 0 0 / 30%), 0 15px 12px rgb(0 0 0 / 22%);
    }
    #title{
        color: #F86A04;
    }
    .row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    /* content */
    .row div {
        background-color: transparent;
        padding: 3%;
        border: 1px solid white;
        border-radius: 50px;
        color: black;
        transition: background-color 1s;

    }

    .row div:nth-child(2n):hover {
        background-color: rgb(248, 106, 4);
        opacity: 0.4;
    }

    .row div:nth-child(2n+1):hover {
        background-color: rgb(248, 106, 4);
        opacity: 0.4;
    }
    /* 6/12 */
    .col-6 {
        width: 50%;
    }
    .logo-img{
        max-width: 190px;
        width: 100%;
    }
    .thank-you-img{
        max-width:304px;
        width: 100%;
    }
</style>

    <div class="container" >
        <div class="">
            <div class="col-12">
                <img class="logo-img"  src="{{ $message->embed('images/logo-fixed.png') }}">
            </div>
            <div class="col-12" style="text-align: center">
                <img class="thank-you-img" src="{{ $message->embed('images/thank-you.png') }}">
            </div>
            <div class="col-12 p-2" style="text-align: start; font-size: 1rem">
                Հարգելի {{$user['name']}} <br> Ձեր գրանցումը Donate.am կայքում հաստատված է․
                կարող եք ծանոթանալ մեր ծրագրերին և նորություններին։<br>
                Շնորհակալություն, որ մեզ հետ եք։
                <br/>
                <div class="div" style="margin-top: 20px; font-size: 1rem">
                Dear {{$user['name']}} <br> Your registration in Donate.am website is confirmed.
                You can get acquainted with our programmes and news.<br>
                Thank you for being with us․
                </div>
                <br>
                Your registered email-id is {{$user['email']}} , Please click on the below button to verify your email account
                <br/>
            </div>
            <style>
                .container-dd {
                    height: 100px;
                    position: relative;
                }
                .vertical-center {
                    margin: 0;
                    position: absolute;
                    top: 50%;
                    -ms-transform: translateY(-50%);
                    transform: translateY(-50%);
                }
            </style>
            <div class="container-dd">
                <div class="vertical-center mt-2">
                    {{-- <button style="width: 250px; height: 50px; border-radius: 30px; border: 0!important;color: white !important; background:#F86A04 !important;" ><a style="color: white !important; text-decoration: none !important; border: none !important;" href="{{url('user/verify', $user->verifyUser->token)}}">Հաստատել / Verify</a></button>--}}
                    <a style="display: flex; align-items: center; font-size: 1rem; width: 250px; height: 50px; border-radius: 30px; border: 0!important;color: #F86A04 !important; text-decoration: underline !important; border: none !important;" href="{{url('user/verify', $user->verifyUser->token)}}">Հաստատել / Verify</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

