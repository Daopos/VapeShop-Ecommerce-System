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
        <div class="order-container">
            <div class="add-product">
                <h2>Completed Order</h2>
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


    <script>
        function confirmDelete(id) {
            var result = confirm("Are you sure you want to cancel this order?");
            if (result) {
                // If the user clicks "OK," submit the form
                document.getElementById('deleteForm_' + id).submit();
            }
        }
    </script>
</body>
</html>
