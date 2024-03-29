<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit product</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminaddproduct.css') }}">
</head>
<body>
    @include('nav')
    <div class="admin-container">
        <div class="addproduct">
            <h1>Edit Product</h1>
        </div>
        <div class="form-container">
            <form class="form-class" method="POST" action="{{ route('editproduct', ['id' => $product->id]) }}" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="inputss">
                    <div class="column-div">
                        <label for="product_image">product image</label>
                        <input name="product_image" type="file" >
                    </div>
                    <div class="column-div">
                        <label for="product_name">product name</label>
                        <input name="product_name" type="text" placeholder="product name" value="{{ $product->product_name }}" required>
                    </div>
                </div>
                <div class="inputss">

                    <div class="column-div">
                        <label for="quantity">product quantity</label>
                        <input name="product_quantity" type="number" placeholder="product quantity" value="{{ $product->product_quantity }}" required>
                    </div>
                    <div class="column-div">
                        <label for="price">product retail price</label>
                        <input name="product_price" type="number" placeholder="product retail price" value="{{ $product->product_price }}" required>
                    </div>
                </div>
                <div class="inputss">
                    <div class="column-div">
                        <label for="product_retailprice">product wholesale price</label>
                        <input  name="product_retailprice" type="number" placeholder="product wholesale price" value="{{ $product->product_wholesaleprice }}" required>
                    </div>
                    <div class="column-div">
                        <label for="product_type">product type</label>
                        <select style="width: 320px" name="product_type" id="">
                            @if( $product->product_type == 'vape')
                                <option value="vape">VAPE</option>
                                <option value="juice">JUICE</option>
                                <option value="dispo">DISPO</option>
                            @elseif( $product->product_type == 'juice')
                                 <option value="juice">JUICE</option>
                                <option value="vape">VAPE</option>
                                <option value="dispo">DISPO</option>
                            @else( $product->product_type == 'dispo')
                                <option value="dispo">DISPO</option>
                                <option value="vape">VAPE</option>
                                <option value="juice">JUICE</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div>
                    <div class="column-div">
                        <label for="product_description">product description</label>
                        <textarea name="product_description" id="" cols="20" rows="5" required>{{ $product->product_description }}</textarea>
                    </div>
                </div>
                <div class="center-button">
                    <input type="submit">
                </div>
            </form>
        </div>

    </div>
</body>
</html>
