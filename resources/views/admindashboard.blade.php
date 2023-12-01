<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
</head>
<body>
    @include('nav')
    <div class="admin-container">
        <div class="top-bg">
            <h2>Dashboard Overview</h2>
        </div>
        <div class="dashboard-boxes">
            <div>
                <h3>Pending Order</h3>
                <h2>0</h2>
            </div>
            <div>
                <h3>Shiped</h3>
                <h2>0</h2>
            </div>
            <div>
                <h3>Order Completed</h3>
                <h2>0</h2>
            </div>
            <div>
                <h3>Total Products</h3>
                <h2>0</h2>
            </div>
            <div>
                <h3>Total Sales</h3>
                <h2>0</h2>
            </div>
            <div>
                <h3>Total Customer</h3>
                <h2>0</h2>
            </div>
        </div>
    </div>
</body>
</html>
