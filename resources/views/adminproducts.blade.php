<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/admindashboard.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/adminproduct.css') }}">
</head>
<body>
    @include('nav')
    <div class="admin-container">
        <div class="product-container">
            <div class="add-product">
                <h2>Product</h2>
                <button><a href="{{ route('addproductform') }}">Add Product</a></button>
            </div>
            <div class="product-table">
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    @foreach($products as $product)

                        <?php
                            $total =$product->product_quantity * $product->product_price;
                        ?>

                        <tr>
                            <td><img src="{{  asset('product_image/' . $product->product_image . ' ') }}" alt="" width="55px"></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_type }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>{{ $total }}</td>
                            <td >
                                <div class="action">
                                    <button><a href="{{ route('productview', ['id' => $product->id]) }}">View</a></button>
                                    <button><a href="{{ route('editproductform', ['id' => $product->id]) }}">Edit</a></button>
                                    <button onclick="confirmDelete({{ $product->id }})">Delete</button>
                                    <form id="deleteForm_{{ $product->id }}" method="POST" action="{{ route('deleteproduct', ['id' => $product->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

    </div>
    <script>
        function confirmDelete(id) {
            var result = confirm("Are you sure you want to delete this product?");
            if (result) {
                // If the user clicks "OK," submit the form
                document.getElementById('deleteForm_' + id).submit();
            }
        }
    </script>
</body>
</html>
