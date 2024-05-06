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
        border-radius: 50px;
        padding: 1.5rem!important;
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
    <div>
        <div class="col-12">
            <img class="logo-img" src="{{ $message->embed('images/logo-fixed.png') }}">
        </div>
        <div class="col-12" style="text-align: center">
            <img class="thank-you-img" src="{{ $message->embed('images/thank-you.png') }}">
        </div>
        <div class="col-12" style="text-align: start">
            <p style="font-size: 1rem">
                Հարգելի {{$donation->fullname}},<br><br>
                Շնորհակալություն նվիրատվության համար: <br>
                Ձեր աջակցությունը շատ կարևոր է, այն կօգնի բարելավել առավել խոցելի երեխաների և նրանց ընտանիքների կյանքը:<br><br>
                Նվիրատվության գումարը՝ {{$donation->amount}} դրամ<br>
                Վճարման ամսաթիվը` {{$donation->created_at}}<br>
                Հարգանքով՝ <br><br>
                Վորլդ Վիժն Հայաստան
            </p>
            <br>
            <div class="div" style="margin-top: 20px">
                <p style="font-size: 1rem">
                    Dear {{$donation->fullname}}, <br><br>
                    Thank you for your donation!<br>
                    We appreciate your contribution. Your generosity will directly benefit most vulnerable children and their families. <br><br>
                    Donation amount: {{$donation->amount}} AMD<br>
                    Payment date: {{$donation->created_at}}<br>
                    Best Regards,  <br><br>
                    World Vision Armenia
                </p>
            </div>
        </div>
    </div>


</div>

</body>
</html>

