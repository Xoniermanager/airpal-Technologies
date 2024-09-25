<!DOCTYPE html>
<html lang="en">

<head>
    <title>Newsletter</title>
</head>

<body>
    <div
        style=" width: 35vw;
    min-width: 350px;
    margin: 4em auto;
    background-color: white;
    border-radius: 12px;
    border:1px solid #eee;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
      rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    padding: 24px;">

        <div style="width:100%;text-align: center;">

            <img src="{{ site('website_logo') ?? '' }}" style="height: 80px">


            <h1>Confimation !</h1>
        </div>
        <div style="width:100%;text-align: center;margin-bottom:10px;">
            <img src="{{ asset('assets/newsletter_icon.gif') }}" width="120px" class="mb-4">
            <p
                style=" color: #757171;
            font-size: 22px;
            padding: 8px;
            margin-top: 4px;">
                Please Click Here For Confirm the NewsLetter.</p>
        </div>
        <div style="width:100%;text-align: center; margin-bottom: 10px;">

            <a href="{{ route('newsletter_verify', getEncryptId($token)) }}"
                style=" background-color:red
                ;
        color: #fff;
        font-size: 15px;
        border-radius: 5px;
        padding: 10px;
    text-decoration: none;
        margin-top: 4px;">Click
                to Confirmed</a>
        </div>
    </div>
</body>

</html>
