<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0px;
            margin:  0px;
        }
        .mail-wrap {
            max-width: 100%;
            padding: 50px;
            background-color: orangered;
            font-family: candara;
        }
        .mail-wrap h2{
            font-family: impact;
            font-size: 40px;
            color: #fff;
        }
        .mail-wrap p{
            font-family: candara;
            font-size: 18px;
            font-weight: normal;
            color: #fff;
        }
        .mail-wrap img{
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="mail-wrap">
        <h2>Welcome {{ $contact_details['name'] }} to uor food service.</h2>
        <p>{{ $contact_details['message'] }}</p>
        <p>We will contact you as soon as possible.</p>
       <br>
       <br>
        <img src="https://scx2.b-cdn.net/gfx/news/hires/2016/howcuttingdo.jpg" alt="">
    </div>
</body>
</html>
