<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'loginform'])->name('login');
Route::post('/', [AdminController::class, 'login']);


Route::get('/dashboard', function() {
    return view('admindashboard');
})->name('dashboard');






Route::get('/product/view/{id}', [ProductController::class, 'productView'])->name('productview');
Route::get('/products', [ProductController::class, 'getAllProduct'])->name('adminproduct');
Route::get('/admin/add', [ProductController::class,'addProductForm'])->name('addproductform');
Route::post('/admin/addproduct', [ProductController::class,'addProduct'])->name('addproduct');
Route::get('/admin/edit/{id}', [ProductController::class,'editProductform'])->name('editproductform');
Route::put('/admin/editproduct/{id}', [ProductController::class,'editProductById'])->name('editproduct');
Route::delete('/delete/product/{id}', [ProductController::class,'deleteProductById'])->name('deleteproduct');


Route::get('/customer/login', [CustomerController::class, 'loginForm'])->name('customerlogin');
Route::post('/customer/login', [CustomerController::class, 'login']);

Route::get('/customer/signup', [CustomerController::class, 'signupForm'])->name('customersignup');
Route::post('/customer/signup', [CustomerController::class, 'signup']);

Route::get('/customer/home', [CustomerController::class, 'homeForm'])->name('customerhome');

Route::get('/customer/vape', [CustomerController::class, 'vapeForm'])->name('customervape');
Route::get('/customer/shop', [CustomerController::class, 'shopForm'])->name('customershop');
Route::get('/customer/juice', [CustomerController::class, 'juiceForm'])->name('customerjuice');
Route::get('/customer/dispo', [CustomerController::class, 'dispoForm'])->name('customerdispo');


Route::get('/customer/view/{id}', [ProductController::class, 'customerView'])->name('customerview');




Route::get('/customer/product/view', function(){
    return view('customer.customerview');
}
);