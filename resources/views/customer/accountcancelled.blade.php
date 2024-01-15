@extends('customer.customeraccount')
@section('content')

@foreach($order as $order)
<div class="item">
    <div>
        <img src="{{  asset('product_image/'.  $order->product_image .'') }}" alt="" width="100px">
        <div>
            <h2>{{ $order->product_name }}</h2>
            <h4>price: ₱{{ $order->product_price }}</h4>
            <h4>qty: {{ $order->order_qty }}</h4>
            <h4>total: ₱{{ $order->order_price }}</h4>
            <h4>order cancelled: {{ $order->updated_at }}</h4>
        </div>
    </div>
</div>
@endforeach

@endsection

