<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customersignup.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="text-login">
            <h1>Vape</h1>
            <h1>shop.</h1>
        </div>

        <img src="{{  asset('assets/image/loginphoto.png') }}" alt="20em" width="300px">


    </div>
    <div class="pic-container">
        <div class="forms">
            <form method="POST" action="">
                @csrf
                <h1>CREAT ACCOUNT</h1>
                <div class="input-container">
                    <div class="two-input">
                        <label for="fname">First name</label>
                        <input name="fname" type="text" placeholder="Enter your first name">
                    </div>
                    <div class="two-input">
                        <label for="lname">Last name</label>
                        <input name="lname" type="text" placeholder="Enter your last name">
                    </div>
                </div>
                <div class="input-container">
                     <div class="two-input">
                        <label for="phone">phone number</label>
                        <input name="phone" type="tel" placeholder="Enter your contact number">
                    </div>
                    <div class="two-input">
                        <label for="address">Address</label>
                        <input name="address" type="text" placeholder="Enter your address">
                    </div>
                </div>
                <div class="input-container">
                    <div class="two-input">
                        <label for="email">Email address</label>
                        <input name="email" type="text" placeholder="Enter your email">
                    </div>

                    <div class="two-input">
                        <label for="password">Password</label>
                        <input name="password" type="password" placeholder="Enter desired password">
                    </div>
                </div>
                <div class="center-btn">
                    <input type="submit" value="Sign up">
                </div>
            </form>
            <div class="or">
                <h5>or</h5>
            </div>
            <div>
                <h5>Already have an account? <span><a href="{{ route('customerlogin') }}">Login</a></span></h5>
            </div>
        </div>
    </div>
</body>
</html>
