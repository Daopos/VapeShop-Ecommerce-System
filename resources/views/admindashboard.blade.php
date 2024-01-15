<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
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
                <h2>{{ $pendingOrder }}</h2>
            </div>
            <div>
                <h3>Shipped</h3>
                <h2>{{ $shipped }}</h2>
            </div>
            <div>
                <h3>Order Completed</h3>
                <h2>{{ $completed }}</h2>
            </div>
            <div>
                <h3>Total Products</h3>
                <h2>{{ $totalProducts }}</h2>
            </div>
            <div>
                <h3>Total Sales</h3>
                <h2>{{ $totalSales }}</h2>
            </div>
            <div>
                <h3>Total Revenue</h3>
                <h2>{{ $totalRevenue }}</h2>
            </div>
            <div>
                <h3>Total Customer</h3>
                <h2>{{ $totalCustomer }}</h2>
            </div>
        </div>

        <div class="bestselling">
            <h3 style="margin-bottom: -20px">Best selling products</h3>
            <div class="product-table" style="width: 500px">
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>sold</th>
                        <th>total cost</th>
                        <th>revenue</th>
                    </tr>
                    @foreach($products as $product)


                        <tr>
                            <td><img src="{{  asset('product_image/' . $product->product_image . ' ') }}" alt="" width="55px"></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->total_qty }}</td>
                            <td>{{ $product->total_cost }}</td>
                            <td>{{ $product->revenue }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</body>
</html>
