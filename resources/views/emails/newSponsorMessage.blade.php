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
        padding: 1.5rem;
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
    <div>
        <div class="col-12">
            <img class="logo-img" src="{{ $message->embed('images/logo-fixed.png') }}">
        </div>
        <div class="col-12" style="text-align: center">
            <img class="thank-you-img" src="{{ $message->embed('images/thank-you.png') }}">

        </div>

        <div class="col-12" style="text-align: start">
            <p style="font-size: 1rem">
                Հարգելի հովանավոր, <br>
                Դուք ստացել եք նամակ Ձեր հովանավորած երեխայից:<br>
                Այն տեսնելու համար մուտք գործեք հետևյալ հղումով <a href="http://donate.am/am/login" style="color: #f86a04;">http://donate.am/am/login</a> <br><br>
                Հարգանքով՝ Վորլդ Վիժն Հայաստան
            </p>
            <br>
            <p style="font-size: 1rem">
                Dear Sponsor, <br>
                you have a new letter from your sponsored child.<br>
                Please find the letter following this link. <a href="http://donate.am/en/login" style="color: #f86a04;">http://donate.am/en/login</a> <br><br>
                Best Regards, World Vision Armenia
            </p>
        </div>
    </div>


</div>

</body>
</html>

