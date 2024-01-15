<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/customerlogin.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    <div class="login-container">
        <div class="text-login">
            <h1>Hideout</h1>
            <h1>Vape shop.</h1>
        </div>

        <div class="forms">
            <form method="POST" action="">
                @csrf
                <h1>LOG IN</h1>
                <input name="email" type="email" placeholder="email">
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


    @if (session('success'))
    <script>
      toastr.success('{{ session('success') }}', 'Success!');
  </script>
  @endif

@if (session('error'))
<script>
  toastr.error('{{ session('error') }}', 'Error!');
</script>
  @endif
</body>
</html>
