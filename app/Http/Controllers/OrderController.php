<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    //

    public function addOrder(Request $request) {
        try {
            $customerId = Session::get('customer_id');

            if (!$customerId) {
                return redirect()->route('customerlogin')->with('error', 'Customer not logged in');
            }

            foreach ($request->productId as $key => $productId) {
                $order = new Order();

                $order->customer_id = $customerId;
                $order->product_id = $productId;
                $order->order_qty = $request->quantities[$key];
                $order->order_price = $request->totalPrice[$key];
                $order->order_status = 'pending';
                $order->revenue = $request->revenue[$key];
                $order->save();

                $cart = Cart::find($request->cartId[$key]);

                if ($cart) {
                    $cart->delete();
                }

                $product = Product::find($productId);

                if ($product) {
                    $product->decrement('product_quantity', $request->quantities[$key]);
                }
            }

            return redirect()->route('customerorderpending')->with('success', 'Successfully ordered');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function addOrderdirect(Request $request) {
        $customerId = Session::get('customer_id');

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $productId = $request->productId;
        $productQuantity = $request->quantities;
        $productTotal = $request->totalPrice;
        $revenues = $request->revenue;

        $cartId = $request->cartId;

        foreach ($productId as $key => $poduct) {
            $order = new Order();

            $order->customer_id = $customerId;
            $order->product_id = $productId[$key];
            $order->order_qty = $productQuantity[$key];
            $order->order_price = $productTotal[$key];
            $order->order_status = 'pending';
            $order->revenue = $revenues[$key];
            $order->save();

            Product::where('id', '=', $productId[$key])->decrement('product_quantity', $productQuantity[$key]);

        }

        // $order = new Order;

        // $order->customer_id = $customerId;
        // $order->product_id = $request->

        return redirect()->route('customerorderpending')->with('success', 'Succesfully ordered');
    }

    public function showAllPending() {

        $customerId = Session::get('customer_id');

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }
        // $orders = Order::where('customer_id', $customerId)
        // ->where('order_status', 'pending')
        // ->get();

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'pending')
        ->where('customer_id', $customerId)
        ->get();



        $customerId = Session::get('customer_id');

        $customer = Customer::find($customerId);



        return view('customer.accountorder')->with('order',$orders)->with('customer', $customer);
    }

    public function showAllShipped() {

        $customerId = Session::get('customer_id');

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'shipped')
        ->where('customer_id', $customerId)
        ->get();


        $customer = Customer::find($customerId);

        return view('customer.accountshipped')->with('order',$orders)->with('customer', $customer);
    }

    public function showAllComplete() {

        $customerId = Session::get('customer_id');



        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'completed')
        ->where('customer_id', $customerId)
        ->get();


        $customer = Customer::find($customerId);

        return view('customer.accountcompleted')->with('order',$orders)->with('customer', $customer);
    }


    public function showAllCancelled() {

        $customerId = Session::get('customer_id');

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'cancelled')
        ->where('customer_id', $customerId)
        ->get();


        $customer = Customer::find($customerId);

        return view('customer.accountcancelled')->with('order',$orders)->with('customer', $customer);
    }

    public function deleteOrder($id) {

        $order = Order::find($id);

        $order->delete();


        return redirect()->back();
    }


    public function adminOrder() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
    ->join('customers', 'customers.id', '=', 'orders.customer_id') // Assuming 'customer_id' is the foreign key in the 'orders' table
    ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price', 'customers.address', 'customers.firstname', 'customers.lastname')
    ->where('order_status', 'pending')
    ->get();
        return view('adminorder')->with('orders', $orders);
    }

    public function adminShipped() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->join('customers', 'customers.id', '=', 'orders.customer_id') // Assuming 'customer_id' is the foreign key in the 'orders' table
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'shipped')
        ->get();

        return view('adminshipped')->with('orders', $orders);
    }

    public function adminCompleted() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->join('customers', 'customers.id', '=', 'orders.customer_id') // Assuming 'customer_id' is the foreign key in the 'orders' table
    ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
        ->where('order_status', 'completed')
        ->get();

        return view('admincompleted')->with('orders', $orders);
    }

    public function adminCancelled() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->join('customers', 'customers.id', '=', 'orders.customer_id') // Assuming 'customer_id' is the foreign key in the 'orders' table
        ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price', 'customers.address', 'customers.firstname', 'customers.lastname')
        ->where('order_status', 'cancelled')
        ->get();

        return view('admincancelled')->with('orders', $orders);
    }

    public function updateOrder(Request $request, $id) {

        $order = Order::find($id);


        $status = $request->updateOrder;

        if($status == "shipped") {

            $customer = $order->customer;

            $order->order_status = 'shipped';

            $order->firstname = $customer->firstname;

            $order->lastname = $customer->lastname;

            $order->address =$customer->address;

        }
         else if($status == 'completed') {
            $order->order_status = 'completed';
         }
         else {
            $order->order_status = 'cancelled';
         }

         $order->save();

         return redirect()->back()->with('success', 'Succesfully updated order');
    }



    public function reports(Request $request) {
        $selectedDays = $request->input('days');

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'products.product_image', 'products.product_name', 'products.product_price')
            ->where('order_status', 'completed')
            ->whereDate('orders.created_at', '>', Carbon::now()->subDays($selectedDays)->toDateString())
            ->get();

        $totalorder = $orders->count();
        $totalprice = $orders->sum('order_price');
        $totalrevenue = $orders->sum('revenue');

        return view('adminreports')->with([
            'orders' => $orders,
            'totalorder' => $totalorder,
            'totalprice' => $totalprice,
            'totalrevenue' => $totalrevenue,
            'selectedDays' => $selectedDays
        ]);
    }
}