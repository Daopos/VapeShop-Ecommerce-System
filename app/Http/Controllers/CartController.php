<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function cartForm() {

        $customerId = Session::get('customer_id');
        if(!$customerId) {
            return redirect()->route('customerlogin');
        }


        $cart = DB::table('carts')
        ->join('customers', 'carts.customer_id', '=', 'customers.id')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.*', 'products.product_image', 'products.product_name', 'products.product_price', 'products.product_quantity')
        ->where('carts.customer_id', '=', Session::get('customer_id'))
        ->get();

        return view('customer.customercart')->with('cart', $cart);
    }


    public function addToCart(Request $request) {
        // Get the customer ID from the session
        $customerId = Session::get('customer_id');

        // Check if a cart with the same product_id and customer_id exists
        $existingCart = Cart::where('product_id', $request->product)
            ->where('customer_id', $customerId)
            ->first();

        $availableQuantity = Product::find($request->product)->product_quantity;

        if ($existingCart) {
            // If the cart already exists, check if updating the quantity exceeds available quantity
            if (($existingCart->qty + $request->quantity) > $availableQuantity) {
                return redirect()->route('customerview', ['id' => $existingCart->product_id])->with('error', 'Quantity exceeds available stock');
            }

            // If the cart already exists and the quantity is less than or equal to available quantity, update the quantity
            $existingCart->qty += $request->quantity;
            $existingCart->save();
            return redirect()->route('customerview', ['id' => $existingCart->product_id])->with('success', 'Added to Cart');
        } else {
            // If the cart doesn't exist, create a new one
            $cart = new Cart;

            $cart->qty = $request->quantity;
            $cart->product_id = $request->product;
            $cart->customer_id = $customerId;

            $cart->save();
            return redirect()->route('customerview', ['id' => $cart->product_id])->with('success', 'Added to Cart');
        }
    }
    public function deleteCart($id) {

        $cart = Cart::find($id);

        if (!$cart) {
            return redirect()->route('cart');
        }

        // Delete the product
        $cart->delete();

        return redirect()->route('cart');

    }

}
