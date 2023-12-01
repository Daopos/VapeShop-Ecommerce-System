<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //

    public function loginForm() {

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
            return redirect()->route('customerlogin')->withErrors(['message' => 'Invalid credentials.']);
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

        // Hash the password before storing it
        $customer->password = bcrypt($request->password);

        // Validate if the required fields are not empty
        if (
            $customer->firstname &&
            $customer->lastname &&
            $customer->address &&
            $customer->phone &&
            $customer->email &&
            $customer->password
        ) {
            // Attempt to save the customer
            if ($customer->save()) {
                // Log in the customer by storing their ID in the session
                session(['customer_id' => $customer->id]);

                return redirect()->route('customerhome')->with('success', 'Welcome new User!');
            } else {
                // Handle the case where save() fails (e.g., log the error)
                return redirect()->route('customersignup')->withErrors(['message' => 'Error saving customer.']);
            }
        } else {
            return redirect()->route('customersignup')->withErrors(['message' => 'Please fill in all required fields.']);
        }
    }

    public function homeForm() {
        return view('customer.customerhome');
    }

    public function vapeForm() {


        $products = Product::all()->where('product_type', 'vape');

        return view('customer.customervape')->with('products', $products);
    }

    public function shopForm() {


        $products = Product::inRandomOrder()->get();;

        return view('customer.customershop')->with('products', $products);
    }

    public function juiceForm() {


        $products = Product::all()->where('product_type', 'juice');

        return view('customer.customerjuice')->with('products', $products);
    }

    public function dispoForm() {


        $products = Product::all()->where('product_type', 'dispo');

        return view('customer.customerdispo')->with('products', $products);
    }

}