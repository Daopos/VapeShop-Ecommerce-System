<div class="nav">
    <div class="menu">
        <h6>MENU</h6>
        <div class="menu-items">
            <li><img src="{{  asset('assets/image/dashboard.png') }}" alt="" width="20px"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><img src="{{  asset('assets/image/product.png') }}" alt="" width="20px"><a href="{{ route('adminproduct') }}">Products</a></li>
            <li><img src="{{  asset('assets/image/orders.png') }}" alt="" width="20px"><a href="{{ route('pendingorder') }}">Orders</a></li>
            <li><img src="{{  asset('assets/image/shipped.png') }}" alt="" width="20px"><a href="{{ route('shippedorder') }}">To ship</a></li>
            <li><img src="{{  asset('assets/image/completed.png') }}" alt="" width="20px"><a href="{{ route('completedorder') }}">Completed</a></li>
            <li><img src="{{  asset('assets/image/cancelled.png') }}" alt="" width="20px"><a href="{{ route('cancelledorder') }}">Cancelled</a></li>
            <li><img src="{{  asset('assets/image/reports.png') }}" alt="" width="20px"><a href="{{ route('reports') }}">Reports</a></li>

            <li style="margin-top: 50px"><img src="{{  asset('assets/image/logout.png') }}" alt="" width="20px">
                <form action="{{ route('adminlogout') }}" method="POST">
                    @csrf
                    <button style="border: none; background-color: inherit; cursor: pointer">Log out</button>
                </form>
            </li>

        </div>
    </div>
</div>
