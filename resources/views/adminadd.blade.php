<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminaddproduct.css') }}">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    @include('nav')
    <div class="admin-container">
        <div class="addproduct">
            <h1>Add Product</h1>
        </div>
        <div class="form-container">
            <form class="form-class" method="POST" action="{{ route('addproduct') }}" enctype='multipart/form-data'>
                @csrf
                <div class="inputss">
                    <div class="column-div">
                        <label for="product_image">product image</label>
                        <input name="product_image" type="file" required>
                    </div>
                    <div class="column-div">
                        <label for="product_name">product name</label>
                        <input name="product_name" type="text" placeholder="product name" required>
                    </div>


                </div>
                <div class="inputss">

                    <div class="column-div">
                        <label for="quantity">product quantity</label>
                        <input name="product_quantity" type="number" placeholder="product quantity" required>
                    </div>
                    <div class="column-div">
                        <label for="price">product wholesale price</label>
                        <input name="product_wholesaleprice" type="number" placeholder="product wholesale price" required>
                    </div>
                </div>
                <div class="inputss">
                    <div class="column-div">
                        <label for="product_retailprice">product retail price</label>
                        <input  name="product_retailprice" type="number" placeholder="product retail price" required>
                    </div>
                    <div class="column-div">
                        <label for="product_type">product type</label>
                        <select style="width: 320px" name="product_type" id="">
                            <option value="vape">VAPE</option>
                            <option value="juice">JUICE</option>
                            <option value="dispo">DISPO</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="column-div">
                        <label for="product_description">product description</label>
                        <textarea name="product_description" id="" cols="20" rows="5" required></textarea>
                    </div>
                </div>
                <div class="center-button">
                    <input type="submit">
                </div>
            </form>
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
</body>
</html>
