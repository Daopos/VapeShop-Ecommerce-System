<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerlogin.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="text-login">
            <h1>Vape</h1>
            <h1>shop.</h1>
        </div>

        <div class="forms">
            <form method="POST" action="">
                @csrf
                <h1>LOG IN</h1>
                <input name="email" type="text" placeholder="username">
                <input name="password" type="password" placeholder="password">
                <input type="submit" value="Log in">
            </form>
            <div class="or">
                <h5>or</h5>
            </div>
            <div>
                <h5>Don't have an account? <span><a href="{{ route('customersignup') }}">Sign up</a></span></h5>
            </div>
        </div>


    </div>
    <div class="pic-container">
        <img src="{{  asset('assets/image/loginphoto.png') }}" alt="20em" width="700px">
    </div>
</body>
</html>
