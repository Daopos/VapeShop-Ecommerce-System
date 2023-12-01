<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customerview.css') }}">
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
                    <div>
                        <h4>Qty:</h4>
                        <input type="number">
                        <h5>{{ $product->product_quantity }} available</h5>
                    </div>

                    <div>
                        <button>Add to Cart</button>
                        <button>Buy now</button>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </div>
</body>
</html>
