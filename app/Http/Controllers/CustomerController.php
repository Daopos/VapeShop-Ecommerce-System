<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //

    public function loginForm() {

        $customerId = Session::get('customer_id');

        if($customerId) {
            return redirect()->route('customerhome');
        }

        return view('customer.customerlogin');

    }

    public function login(Request $request) {
        // Validate the login request
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Find the customer by email
        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            // Password is correct
            // Store the customer's ID in the session
            session(['customer_id' => $customer->id]);

            return redirect()->route('customerhome')->with('success', 'Welcome back!');
        } else {
            // Invalid email or password
            return redirect()->route('customerlogin')->with('error', 'Invalid credentials!');
        }
    }

    public function signupForm(){

        return view('customer.customersignup');

    }

    public function signup(Request $request) {

        $customer = new Customer;

        $customer->firstname = $request->fname;
        $customer->lastname = $request->lname;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $confirm = $request->confirm;
        $customer->password = $request->password;

        // Hash the password before storing it


        // Validate if the required fields are not empty
        if (
            $customer->firstname &&
            $customer->lastname &&
            $customer->address &&
            $customer->phone &&
            $customer->email &&
            $customer->password == $confirm
        ) {
            $customer->password = bcrypt($request->password);
            // Attempt to save the customer
            if ($customer->save()) {
                // Log in the customer by storing their ID in the session

                return redirect()->route('customerlogin')->with('success', 'Welcome new User!');
            } else {
                // Handle the case where save() fails (e.g., log the error)
                return redirect()->route('customersignup')->withErrors(['message' => 'Error saving customer.']);
            }
        } else {
            return redirect()->route('customersignup')->withErrors(['message' => 'Please fill in all required fields.']);
        }
    }


    public function editForm() {



        $customerId = Session::get('customer_id');

        $customer = Customer::find($customerId);

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        return view('customer.accountedit')->with('customer', $customer);
    }

    public function edit(Request $request, $id) {

        $customer = Customer::find($id);

        $customer->firstname = $request->fname;
        $customer->lastname = $request->lname;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        $customer->update();

        return redirect()->route('customerorderpending')->with('success', 'Succesfully eidt profile!');
    }

    public function logout() {


        Session::forget('customer_id');

        return redirect()->route('customerlogin');
    }

    public function homeForm() {

        $customerId = Session::get('customer_id');

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        return view('customer.customerhome');
    }

    public function vapeForm() {

        $customerId = Session::get('customer_id');


        if(!$customerId) {
            return redirect()->route('customerlogin');
        }


        $products = Product::all()->where('product_type', 'vape');

        return view('customer.customervape')->with('products', $products);
    }

    public function shopForm() {

        $customerId = Session::get('customer_id');


        if(!$customerId) {
            return redirect()->route('customerlogin');
        }



        $products = Product::inRandomOrder()->get();;

        return view('customer.customershop')->with('products', $products);
    }

    public function juiceForm() {

        $customerId = Session::get('customer_id');


        if(!$customerId) {
            return redirect()->route('customerlogin');
        }


        $products = Product::all()->where('product_type', 'juice');

        return view('customer.customerjuice')->with('products', $products);
    }

    public function dispoForm() {

        $customerId = Session::get('customer_id');


        if(!$customerId) {
            return redirect()->route('customerlogin');
        }



        $products = Product::all()->where('product_type', 'dispo');

        return view('customer.customerdispo')->with('products', $products);
    }

    public function directCheckout($productId, $qty) {


        $customerId = Session::get('customer_id');
        $customer = Customer::find($customerId);
        $product = Product::find($productId);


        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $test = $qty;

        return view('customer.customerdirectbuy')
            ->with('qty', $test)
            ->with('item', $product)
            ->with('address', $customer);
    }


    public function checkOut(Request $request) {

        $cartIds = $request->input('selected_items');
        $quantities = $request->input('quantities');
        $updatedCartIds = [];

        if (empty($cartIds)) {
            return redirect()->route('cart')->with('error', 'No selected Item!');
        }

        foreach ($cartIds as $index => $cartId) {
            $cart = Cart::find($cartId);
            if ($cart) {
                // Get the updated quantity using the new name format
                $updatedQuantity = $quantities[$cartId];

                $cart->qty = $updatedQuantity;
                $cart->save();
                $updatedCartIds[] = $cart->id;
            }
        }

        $customerId = Session::get('customer_id');

        $customer = Customer::find($customerId);

        if(!$customerId) {
            return redirect()->route('customerlogin');
        }



        $updatedCartsFromDatabase = Cart::whereIn('carts.id', $updatedCartIds)
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select(
            'carts.*',
            'products.product_image',
            'products.product_name',
            'products.product_price',
            'products.product_quantity',
            'products.product_wholesaleprice'

        )
        ->get();
        return view('customer.customercheckout')->with("items", $updatedCartsFromDatabase)->with('address', $customer);
    }

    public function account() {



    }
}