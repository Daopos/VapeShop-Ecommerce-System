<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completed order</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminorder.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminproduct.css') }}">
</head>
<body>
    @include('nav')
    <div class="admin-container">

        <div class="admin-container">
            <div class="top-bg">
                <h2>Reports Overview</h2>
            </div>
            <div class="dashboard-boxes">
                <div>
                    <h3>Total Order</h3>
                    <h2>{{ $totalorder }}</h2>
                </div>
                <div>
                    <h3>Total Cost</h3>
                    <h2>{{ $totalprice }}</h2>
                </div>
                <div>
                    <h3>Total Revenue</h3>
                    <h2>{{ $totalrevenue }}</h2>
                </div>

            </div>
        <div class="order-container">
            <div class="add-product">
                <form id="reportForm" method="get" action="{{ route('reports') }}">
                    @csrf
                    <div class="container-text" style="margin-top: 20px">
                        <select name="days" id="days" onchange="this.form.submit()">
                            <option value="7" {{ $selectedDays == 7 ? 'selected' : '' }}>1 week ago</option>
                            <option value="14" {{ $selectedDays == 14 ? 'selected' : '' }}>2 weeks ago</option>
                            <option value="21" {{ $selectedDays == 21 ? 'selected' : '' }}>3 weeks ago</option>
                            <option value="30" {{ $selectedDays == 30 ? 'selected' : '' }}>1 month ago</option>
                            <option value="60" {{ $selectedDays == 60 ? 'selected' : '' }}>2 months ago</option>
                            <option value="90" {{ $selectedDays == 90 ? 'selected' : '' }}>3 months ago</option>
                            <option value="120" {{ $selectedDays == 120 ? 'selected' : '' }}>4 months ago</option>
                            <option value="150" {{ $selectedDays == 150 ? 'selected' : '' }}>5 months ago</option>
                            <option value="180" {{ $selectedDays == 180 ? 'selected' : '' }}>6 months ago</option>
                            <option value="210" {{ $selectedDays == 210 ? 'selected' : '' }}>7 months ago</option>
                            <option value="240" {{ $selectedDays == 240 ? 'selected' : '' }}>8 months ago</option>
                            <option value="270" {{ $selectedDays == 270 ? 'selected' : '' }}>9 months ago</option>
                            <option value="300" {{ $selectedDays == 300 ? 'selected' : '' }}>10 months ago</option>
                            <option value="330" {{ $selectedDays == 330 ? 'selected' : '' }}>11 months ago</option>
                            <option value="365" {{ $selectedDays == 365 ? 'selected' : '' }}>1 year ago</option>
                            <option value="730" {{ $selectedDays == 730 ? 'selected' : '' }}>2 years ago</option>
                            <option value="1095" {{ $selectedDays == 1095 ? 'selected' : '' }}>3 years ago</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="product-table">
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>address</th>
                        <th>Order Date</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Net Revenue</th>
                    </tr>
                    @foreach($orders as $order)


                        <tr>
                            <td><img src="{{  asset('product_image/' . $order->product_image . ' ') }}" alt="" width="55px"></td>
                            <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->order_qty}}</td>
                            <td>{{ $order->order_price }}</td>
                            <td>{{ $order->revenue }}</td>

                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

        </div>



</body>
</html>
