<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />

    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customercart.css') }}">
</head>
<body>
    @include('customer.customernav')

    <div class="home-container">
        <div class="cart-container">
            <h1>Product Orders</h1>
            <form method="POST" action="{{ route('addorder') }}">
                @csrf
                @method('POST')
                <div class="product-list">
                    <table>
                        <tr>
                            <th>Product details</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        @foreach($items as $item)
                        <tr>
                            <input  type="hidden" name="cartId[]" value="{{  $item->id }}" >
                            <input type="hidden" name="productId[]", value="{{ $item->product_id }}">
                            <input  class="qty" type="hidden" name="quantities[]" value="{{ $item->qty }}">
                            <input  type="hidden" name="totalPrice[]" value="{{  $item->product_price * $item->qty }}" >
                            <input  type="hidden" name="revenue[]" value="{{$item->product_price * $item->qty -   $item->product_wholesaleprice * $item->qty   }}" >
                            <td><img src="{{  asset('product_image/' . $item->product_image) }}" alt="" height="80px"></td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_price }}</td>
                            <td><input style="background-color: inherit; border: none;" disabled class="qty" type="number" name="quantities[]" value="{{ $item->qty }}"></td>
                            <td class="totalprice"><input type="text" style="background-color: inherit; border: none;" name="totalPrice[]" value="{{  $item->product_price * $item->qty }}" disabled></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="summary">
                    <div class="summary-list">
                        <h1>Summary</h1>


                        <div class="white-box">
                            <div class="end-to-end">
                                <h5>Address: {{ $address->address }}</h5>
                            </div>
                            <div class="end-to-end">
                                <h5>Subtotal:</h5>
                                <h5 id="summarry-subtotal">0</h5>
                            </div>
                            <div class="end-to-end">
                                <h5>Delivery:</h5>
                                <h5 id="summarry-delivery">70</h5>
                            </div>
                            <div class="summary-line"></div>
                            <div class="end-to-end">
                                <h5>Total:</h5>
                                <h5 id="summary-total">0</h5>
                            </div>
                        </div>
                        <input type="submit" value="CHECKOUT">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateSummary() {
            var subtotal = 0;
            var totalInputs = document.querySelectorAll('.totalprice input');

            totalInputs.forEach(function (input) {
                subtotal += parseFloat(input.value);
            });

            var delivery = parseFloat(document.getElementById('summarry-delivery').textContent);
            var total = subtotal + delivery;

            document.getElementById('summarry-subtotal').textContent = subtotal.toFixed(2);
            document.getElementById('summary-total').textContent = total.toFixed(2);
        }

        // Event listener for page load
        document.addEventListener("DOMContentLoaded", function() {
            updateSummary();
        });
    </script>
</body>
</html>
