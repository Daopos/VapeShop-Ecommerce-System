<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/assets/image/top-logo.png')}}" />
    <link rel="stylesheet" href="{{ asset('assets/style/customerhome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/customerindex.css') }}">
</head>
<body>
    @include('customer.customernav')

    <div class="home-container">
        <div class="row">
            <div class="col-2">
                <h1> Don't VAPE, <br>Where you can't SMOKE!</h1>
                <p>Vaping is not a TREND it's a LIFESTYLE.</p>
                <a href="{{ route('customershop') }}" class="btn"> Browse now &#8599;</a>
            </div>
            <div class="col-2">
                <img src="{{ asset('assets/image/vapers.jpg') }}">
            </div>
        </div>
    </div>
    <!-- CATEG !-->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('assets/image/VAPEMOD.jpg') }}">
                </div>
                <div class="col-3">
                    <img src="{{ asset('assets/image/ATOMIZER.jpg') }}">
                </div>
                <div class="col-3">
                    <img src="{{ asset('assets/image/VAPEJUICE.jpg') }}">
                </div>
            </div>
        </div>
    </div>
    <!-- FT. PRODUCTS !-->
    <div class="small-container">
        <h2 class="title"> Our Products</h2>
        <div class="row">
            <div class="col-4">
                <a href="product-details.html"><img src="{{ asset('assets/image/LEGEND.jpg') }}"> </a>
                <a href="product-details.html"><h4> Aegis Legend </h4> </a>
                <p>PHP 2500.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/ZEUSATOMIZER.jpg') }}">
                <h4> Zeus Atomizer </h4>
                <p>PHP 1500.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/RX200.jpg') }}">
                <h4> RX 200 </h4>

                <p>PHP 1200.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/DROPATOMIZER.jpg') }}">
                <h4> Drop </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>PHP 1600.00 </p>
            </div>
        </div>
        <h2 class="title"> More Products </h2>
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('assets/image/DEADWOOD.jpg') }}">
                <h4> Deadwood 60ml (3mg/6mg/9mg/12mg) </h4>

                <p>PHP 200.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/ICLOUDS.jpg') }}">
                <h4> Iclouds 60ml (3mg/6mg/9mg) </h4>

                <p>PHP 300.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/DRCLOUDS.jpg') }}">
                <h4> DR. Clouds 100ml (3mg/6mg) </h4>

                <p>PHP 250.00 </p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/LONGDRAG.jpg') }}">
                <h4> Long Drag 60ml(3mg/6mg/9mg/12mg) </h4>

                <p>PHP 300.00 </p>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('assets/image/SNOOPY.jpg') }}">
                    <h4> Snoopy 100ml (3mg/6mg/9mg/12mg) </h4>

                    <p>PHP 300.00 </p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('assets/image/NERDZ.jpg') }}">
                    <h4> Nerdz 60ml (3mg/6mg/9mg/12mg) </h4>

                    <p>PHP 200.00 </p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('assets/image/DRFOG.jpg') }}">
                    <h4> DR. FOG 100ml(3mg/6mg) </h4>

                    <p>PHP 300.00 </p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('assets/image/YAKULT.jpg') }}">
                    <h4> Yakult 60ml(3mg/6mg) </h4>

                    <p>PHP 250.00 </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ... (rest of the code) ... -->

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('assets/image/RELX.png') }}" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Available on The Vape Store</p>
                    <h1>Relx Classic</h1>
                    <small>The Relx Classic is a simple device. It’s lightweight and compact with magnetized drop-in pods and an automatic MTL draw. A pod vape designed to be simple. It’s only got two parts, a battery device, and the pods.</small>
                    <a href="btn">BUY NOW! &#8599; </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ... (rest of the code) ... -->



    <script>
        var ManuItems = document.getElementById("MenuItems");
        ManuItems.style.maxHeight = "0px";
        function menutoggle(){
            if(ManuItems.style.maxHeight == "0px")
            {
                ManuItems.style.maxHeight = "200px"
            }
            else
            {
                ManuItems.style.maxHeight = "0px"
            }
        }
    </script>
</body>
</html>
