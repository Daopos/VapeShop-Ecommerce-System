<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customervape.css') }}">

</head>
<body>
    @include('customer.customernav')



    <div class="home-container">
        <div class="vape-container">
            <div class="text-container">
                <h1>All Vape</h1>
            </div>

            <div class="item-container">
                @foreach($products as $product)
                <div class="item">
                    <img src="{{  asset('product_image/' . $product->product_image . ' ') }}" alt="">
                    <h3>Name: {{ $product->product_name }}</h3>
                    <h3>Qty: {{ $product->product_quantity }}</h3>
                    <h3>Price: {{  $product->product_price }}</h3>
                </div>
                @endforeach


            </div>

        </div>
    </div>
</body>
</html>
