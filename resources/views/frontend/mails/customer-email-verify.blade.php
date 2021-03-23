<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account</title>
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
        <h2>Welcome {{ $verify_details['name'] }} to uor furniture service.</h2>
        <p>Your email address is {{ $verify_details['email'] }}</p>
        <p>Your verifed code is {{ $verify_details['code'] }}</p>
        <p>Congratulation, you successfully signup, please verifed your email addess</p>
       <br>
       <br>
        <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/03/69/42/6857b4809a1f944.jpg" alt="">
    </div>
</body>
</html>
