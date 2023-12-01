<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminview.css') }}">
</head>
<body>
    @include('nav')

    <div class="admin-container">
        <div class="view-container">
            <div>
                <div class="view">
                    <h1>VIEW PRODUCT</h1>
                </div>
                <div class="item-container">
                    <div>
                        <img src="{{  asset('product_image/' . $product->product_image . ' ') }}" alt="" width="205px">
                    </div>
                    <div>
                        <p><span>Description:</span> {{ $product->product_description }}</p>
                        <h3><span>Name:</span>{{ $product->product_name }}</h3>
                        <h3><span>Type:</span> {{ $product->product_type }}</h3>
                        <h3><span>quantity:</span> {{ $product->product_quantity }}</h3>
                        <h3><span>price:</span> {{ $product->product_price }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
