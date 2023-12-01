<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{  asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{  asset('assets/style/customercart.css') }}">

</head>
<body>
    @include('customer.customernav')



    <div class="home-container">
        <div class="cart-container">
            <h1>Product cart</h1>
            <form action="">
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
                        <tr>
                            <td></td>
                            <td><img src="" alt=""></td>
                            <td>name</td>
                            <td>1222</td>
                            <td><input type="text"></td>
                            <td>232323</td>
                            <td>x</td>
                        </tr>
                    </table>
                </div>
                <div class="summary">
                    <div>
                        <h1>Summary</h1>
                        <div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <input type="submit" value="PROCEED TO CHECKOUT">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
