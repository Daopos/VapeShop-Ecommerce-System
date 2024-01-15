<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customerview.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />

</head>
<body>
    @include('customer.customernav')

    <div class="home-container">
        <div class="view-container">

            <div class="view-box">

                <div>
                    <img src="{{  asset('product_image/' . $product->product_image . ' ') }}" alt="">
                </div>

                <div class="vape-item">
                    <h2>{{ $product->product_name }}</h2>
                    <h1>{{ $product->product_price }}</h1>
                    <p>{{ $product->product_description }}</p>
                    <h4>Shipping: 70</h4>
                    <form action="{{ route('addtocart') }}" method="post">
                        @csrf
                    <div>
                        <h4>Qty:</h4>
                        <input  id="quantityInput" name="quantity" type="number" min="1" max="{{ $product->product_quantity }}">
                        <h5>{{ $product->product_quantity }} available</h5>
                    </div>

                    <div>
                            <input name="product" type="hidden" value="{{ $product->id }}">
                            <button>Add to Cart</button>
                        </form>
                        <button id="buyNowBtn">Buy now</button>
                    </div>
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
    <script>
        document.getElementById('buyNowBtn').addEventListener('click', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the quantity value
            var quantityInput = document.getElementById('quantityInput');
            var quantity = quantityInput.value;

            // Get the max quantity allowed
            var maxQuantity = {{ $product->product_quantity }};

            // Check if the quantity is valid
            if (quantity === null || quantity === "" || isNaN(quantity) || quantity <= 0 || quantity > maxQuantity) {
                alert("Please enter a valid quantity.");
                return;
            }

            // Redirect to the checkout page with the product ID and quantity
            window.location.href = "{{ route('checkoutdirect', ['productId' => $product->id, 'qty' => '']) }}/" + quantity;
        });
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
