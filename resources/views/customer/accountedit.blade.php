<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customeraccount.css') }}">
</head>
<style>
    .center-container {
        display: flex;
        justify-content: center

    }
</style>
<body>
    @include('customer.customernav')

    <form method="POST" action="{{ route('customereditacccount' , ['id' => $customer->id]) }}" >
        @csrf
        @method('PUT')
    <div class="home-container">
        <div class="center-container">
            <div class="my-account">
                <h1>My Account</h1>
                <div>
                    <h3>First Name</h3>
                    <input type="text" name="fname" value="{{ $customer->firstname }}">
                </div>
                <div>
                    <h3>Last Name</h3>
                    <input type="text" name="lname" value="{{ $customer->lastname }}">
                </div>
                <div>
                    <h3>Email</h3>
                    <input type="email" name="email" value="{{ $customer->email }}">
                </div>
                <div>
                    <h3>Phone</h3>
                    <input type="tel" name="phone" value="{{ $customer->phone  }}">
                </div>
                <div>
                    <h3>Address</h3>
                    <input type="text" name="address" value="{{ $customer->address }}">
                </div>
                    <button style="background-color: #363062">Confirm</button>
                <div class="editprofile">
                    <a style="background-color: #872341" href="{{ route('customerorderpending') }}">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html>
