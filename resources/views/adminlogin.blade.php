<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/adminlogin.css') }}">
</head>
<body>
    <div class="login-container">
        <div>
            <h1>Vape</h1>
            <h1>shop.</h1>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Admin</h1>
            <input name="username" type="text" placeholder="username">
            <input name="password" type="password" placeholder="password">
            <input type="submit" value="Log in">
        </form>

    </div>
    <div class="pic-container">
        <img src="{{  asset('assets/image/loginphoto.png') }}" alt="20em" width="700px">
    </div>
</body>
</html>
