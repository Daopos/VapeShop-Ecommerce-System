<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/adminlogin.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    <div class="login-container">
        <div>
            <h1>Hideout</h1>
            <h1>Vape shop.</h1>
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
