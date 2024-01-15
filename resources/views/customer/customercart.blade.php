<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customercart.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    @include('customer.customernav')

    <div class="home-container">
        <div class="cart-container">
            <h1>Product cart</h1>
            <form method="GET" action="{{ route('checkout') }}">
                @csrf
                @method('POST')
                <div class="product-list">
                    <table>
                        <tr>
                            <th></th>
                            <th>Product details</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        @foreach($cart as $cartItem)
                        <tr>
                            <td><input type="checkbox" name="selected_items[]" value="{{ $cartItem->id }}"></td>
                            <td><img src="{{  asset('product_image/' . $cartItem->product_image) }}" alt="" height="80px"></td>
                            <td>{{ $cartItem->product_name }}</td>
                            <td>{{ $cartItem->product_price }}</td>
                            <td><input min="1" max="{{ $cartItem->product_quantity }}" class="qty" type="number" name="quantities[{{ $cartItem->id }}]" value="{{ $cartItem->qty }}"
                               ></td>
                            <td class="totalprice" id="totalprice"></td>
                            <td><a style="text-decoration: none;" href="{{ route('deletecart', ['id' => $cartItem->id]) }}">Remove</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="summary">
                    <div class="summary-list">
                        <h1>Summary</h1>
                        <div class="white-box">
                            <div class="end-to-end">
                                <h5>Subtotal:</h5>
                                <h5 id="summarry-subtotal"></h5>
                            </div>
                            <div class="end-to-end">
                                <h5>Delivery:</h5>
                                <h5 id="summarry-delivery">70</h5>
                            </div>
                            <div class="summary-line"></div>
                            <div class="end-to-end">
                                <h5>Total:</h5>
                                <h5 id="total"></h5>
                            </div>
                        </div>
                        <input type="submit" value="PROCEED TO CHECKOUT">
                    </div>
                </div>
            </form>
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var cart = JSON.parse(localStorage.getItem('cart')) || [];
        var quantityInputs = document.querySelectorAll('.qty');
        var checkboxInputs = document.querySelectorAll('input[name="selected_items[]"]');

        function updateTotals() {
            var summarySubtotal = 0;

            checkboxInputs.forEach(function (checkbox, index) {
                if (checkbox.checked) {
                    var input = quantityInputs[index];
                    var row = input.closest('tr');
                    var price = parseFloat(row.querySelector('td:nth-child(4)').textContent);
                    var quantity = parseInt(input.value);
                    var totalPriceElement = row.querySelector('.totalprice');
                    var total = price * quantity;
                    totalPriceElement.textContent = total.toFixed(2);

                    var cartItem = cart.find(item => item.id == checkbox.value);
                    if (cartItem) {
                        cartItem.qty = quantity;
                        cartItem.total = total;
                    }

                    summarySubtotal += total;
                }
            });

            var summarySubtotalElement = document.getElementById('summarry-subtotal');
            var totalElement = document.getElementById('total');
            var deliveryCost = 70;

            summarySubtotalElement.textContent = summarySubtotal.toFixed(2);
            totalElement.textContent = (summarySubtotal + deliveryCost).toFixed(2);

            localStorage.setItem('cart', JSON.stringify(cart));
        }

        checkboxInputs.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                updateTotals();
            });
        });

        quantityInputs.forEach(function (input) {
            input.addEventListener('input', function () {
                updateTotals();
            });
        });

        // Load cart data into the HTML on page load
        cart.forEach(function (cartItem) {
            var checkbox = document.querySelector('input[name="selected_items[]"][value="' + cartItem.id + '"]');
            var index = Array.from(checkboxInputs).indexOf(checkbox);
            var row = quantityInputs[index].closest('tr');

            quantityInputs[index].value = cartItem.qty;
            row.querySelector('.totalprice').textContent = cartItem.total.toFixed(2);
        });

        // Update totals on page load
        updateTotals();
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
