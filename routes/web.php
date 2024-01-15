<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
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

Route::post('/logout', [AdminController::class, 'logout'])->name('adminlogout');



Route::get('/dashboard', [AdminController::class, 'dashboardform'])->name('dashboard');





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

Route::get('/customer/edit/profile', [CustomerController::class, 'editForm'])->name('customeredit');
Route::put('/customer/edit/account/{id}', [CustomerController::class, 'edit'])->name('customereditacccount');

Route::get('/customer/logout', [CustomerController::class, 'logout'])->name('customerlogout');

Route::get('/customer/home', [CustomerController::class, 'homeForm'])->name('customerhome');

Route::get('/customer/vape', [CustomerController::class, 'vapeForm'])->name('customervape');
Route::get('/customer/shop', [CustomerController::class, 'shopForm'])->name('customershop');
Route::get('/customer/juice', [CustomerController::class, 'juiceForm'])->name('customerjuice');
Route::get('/customer/dispo', [CustomerController::class, 'dispoForm'])->name('customerdispo');


Route::get('/customer/view/{id}', [ProductController::class, 'customerView'])->name('customerview');

Route::post('/customer/addtocart', [CartController::class, 'addToCart'])->name('addtocart');
Route::match(['get', 'delete'],'/customer/deletecart/{id}', [CartController::class, 'deleteCart'])->name('deletecart');
Route::get('/customer/cart', [CartController::class, 'cartForm'])->name('cart');

Route::get('/checkout', [CustomerController::class, 'checkOut'])->name('checkout');
Route::get('/checkout/direct/{productId}/{qty?}', [CustomerController::class, 'directCheckout'])->name('checkoutdirect');

Route::post('/checkout/product', [OrderController::class, 'addOrder'])->name('addorder');
Route::delete('/order/delete/{id}', [OrderController::class, 'deleteorder'])->name('deleteorder');
Route::put('/order/update/{id}', [OrderController::class, 'updateOrder'])->name('updateorder');
Route::post('/checkout/product/direct', [OrderController::class, 'addOrderdirect'])->name('addorderdirect');

Route::get('/pendingorder', [OrderController::class, 'adminOrder'])->name('pendingorder');
Route::get('/shippedorder', [OrderController::class, 'adminShipped'])->name('shippedorder');
Route::get('/completedorder', [OrderController::class, 'adminCompleted'])->name('completedorder');
Route::get('/cancelledorder', [OrderController::class, 'adminCancelled'])->name('cancelledorder');



Route::get('customer/order/pending', [OrderController::class, 'showAllPending'])->name('customerorderpending');
Route::get('customer/order/shipped', [OrderController::class, 'showAllShipped'])->name('customerordershipped');
Route::get('customer/order/completed', [OrderController::class, 'showAllComplete'])->name('customerordercompleted');
Route::get('customer/order/cancelled', [OrderController::class, 'showAllCancelled'])->name('customerordercancelled');


Route::get('/reports', [OrderController::class, 'reports'])->name('reports');