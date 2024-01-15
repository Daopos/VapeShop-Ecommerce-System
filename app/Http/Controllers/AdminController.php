<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function loginform() {

        $adminid = Session::get('id');

        if($adminid) {
            return redirect()->route('dashboard');
        }

        return view('adminlogin');
    }

    public function login(Request $request) {


        $username = $request->input('username');
        $password = $request->input('password');

        $selected = Admin::where('username', $username)->first();

        if($selected && $selected->password === $password) {
            $id = $selected->id;
            Session::put('id', $id);
            return redirect()->route('dashboard');
        }
        else {
            return redirect()->route('login')->with('error', 'Invalid credentials!');
        }


    }

    public function logout() {

        Session::forget('id');

        return redirect()->route('login');

    }

    public function dashboardform() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $pendingOrder = Order::where('order_status', '=', 'pending')->count();

        $shipped = Order::where('order_status', '=', 'shipped')->count();

        $completed = Order::where('order_status', '=', 'completed')->count();

        $totalProducts = Product::count();

        $totalSales = Order::where('order_status', '=', 'completed')->sum('order_price');

        $totalRevenue = Order::where('order_status', '=', 'completed')->sum('revenue');

        $totalCustomer = Customer::count();



        $bestselling = Order::join('products', 'products.id', '=', 'orders.product_id')
        ->select('products.id', 'products.product_name', 'products.product_image', 'orders.revenue', DB::raw('SUM(orders.order_qty) as total_qty'),  DB::raw('SUM(orders.order_price) as total_cost'))
        ->groupBy('products.id', 'products.product_name', 'products.product_image', 'orders.revenue')
        ->orderBy('total_qty', 'DESC')
        ->where('orders.order_status', '=', 'completed')
        ->limit(5)
        ->get();


        return view('admindashboard')->with('products', $bestselling)
        ->with('pendingOrder', $pendingOrder)
        ->with('shipped', $shipped)
        ->with('completed', $completed)
        ->with('totalProducts', $totalProducts)
        ->with('totalSales', $totalSales)
        ->with('totalRevenue', $totalRevenue)
        ->with('totalCustomer', $totalCustomer);

    }
}