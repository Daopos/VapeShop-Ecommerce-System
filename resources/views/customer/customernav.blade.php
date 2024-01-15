<nav class="user-nav">
    <div><h2><a href="{{ route('customerhome') }}">hideout</a></h2></div>
    <div class="nav-list">
        <li><a href="{{ route('customershop') }}">Shop</a></li>
        <li><a href="{{ route('customervape') }}">Vape</a></li>
        <li><a href="{{ route('customerjuice') }}">Juice</a></li>
        <li><a href="{{ route('customerdispo') }}">Dispo</a></li>
    </div>
    <div class="user-list">
        <li><a href="{{ route('cart') }}"><img src="{{  asset('assets/image/shopping-cart.png') }}" width="20px" alt=""></a></li>
        <li><a href="{{ route('customerorderpending') }}"><img src="{{  asset('assets/image/user-profile.png') }}" width="20px" alt=""></a></li>

        <form action="{{ route('customerlogout') }}" method="get" >
            <button style="margin-top: -5px; background: none; border: none; cursor:pointer">Log Out</button>
        </form>
    </div>
</nav>
