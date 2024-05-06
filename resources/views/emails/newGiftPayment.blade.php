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
        /*border: 1px solid #F86A04;*/
        padding: 1.5rem!important;
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
    .im{
        color: #000;
    }
</style>

<div class="container" >
    <div>
        <div class="col-12">
            <img class="logo-img" src="{{ $message->embed('images/logo-fixed.png') }}">
        </div>
        <div class="col-12" style="text-align: center">
            <img class="thank-you-img" src="{{ $message->embed('images/thank-you.png') }}">
        </div>

        <div class="col-12" style="text-align: start; font-size: 1rem; color: #000;">
            {!!$data['body']!!}
        </div>
        <br>
        <div class="col-12" style="text-align: start; font-size: 1rem; color: #000;">
            {!!$data['title']!!}
        </div>
    </div>
</div>

</body>
</html>

