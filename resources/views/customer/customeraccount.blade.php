<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customeraccount.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    @include('customer.customernav')

    <div class="home-container">
        <div class="account-container">
            <div class="my-account">
                <h1>My Account</h1>
                <div>
                    <h3>Name</h3>
                    <h3>{{ $customer->firstname }} {{ $customer->lastname }}</h3>
                </div>
                <div>
                    <h3>Email</h3>
                    <h3>{{ $customer->email }}</h3>
                </div>
                <div>
                    <h3>Phone</h3>
                    <h3>{{ $customer->phone }}</h3>
                </div>
                <div>
                    <h3>Address</h3>
                    <h3>{{ $customer->address }}</h3>
                </div>

                <div class="editprofile">
                    <a href="{{ route('customeredit') }}">Edit Profile</a>
                </div>

            </div>
            <div class="purchase">
                <h1>Purchase</h1>
                <div class="purchase-box">
                    <div class="nav-box">
                        <ul>
                            <li><a href="{{ route('customerorderpending') }}">Order</a></li>
                            <li><a href="{{ route('customerordershipped') }}">To ship</a></li>
                            <li><a href="{{ route('customerordercompleted') }}">Completed</a></li>
                            <li><a href="{{ route('customerordercancelled') }}">Cancelled</a></li>
                        </ul>
                    </div>
                    <div class="purchase-item">
                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
      // Display Toastr notification for success
      toastr.success('{{ session('success') }}', 'Success!');
  </script>
  @endif

@if (session('error'))
<script>
  // Display Toastr notification for success
  toastr.error('{{ session('error') }}', 'Error!');
</script>
  @endif
</body>
</html>
