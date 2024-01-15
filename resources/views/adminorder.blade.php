<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminorder.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminproduct.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    @include('nav')
    <div class="admin-container">
        <div class="order-container">
            <div class="add-product">
                <h2>Pending Order</h2>
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
                        <th>Action</th>
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
                            <td>
                                <div class="action">
                                    <form id="update" method="POST" action="{{ route('updateorder', ['id' => $order->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="updateOrder" value="shipped">
                                        <button style="background-color: #25C035">Confirm</button>
                                    </form>
                                    <button style="background-color: #F52525" onclick="confirmDelete({{ $order->id }})">Cancel</button>
                                    <form id="deleteForm_{{ $order->id }}" method="POST" action="{{ route('updateorder', ['id' => $order->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="updateOrder" value="canceled">
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

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
