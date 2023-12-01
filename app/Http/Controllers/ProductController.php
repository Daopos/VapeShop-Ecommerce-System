<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function getAllProduct() {
        $products = Product::all();

        return view('adminproducts')->with('products', $products);
    }

    public function getProductbyid(Request $request, $id) {
        $product = Product::find($id);

        if ($product) {
            return view("", ["product"=> $product]);
        }
    }


    public function addProductForm() {
        return view("adminadd");
    }
    public function addProduct(Request $request) {

    $name = $request->product_name;
    $price = $request->product_price;
    $quantity = $request->product_quantity;
    $description = $request->product_description;
        $type = $request->product_type;


    if ($request->hasFile('product_image')) {
        $file = $request->file('product_image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('product_image'), $filename);


        $product = new Product;

        $product->product_name = $name;
        $product->product_image = $filename;
        $product->product_price = $price;
        $product->product_quantity = $quantity;
        $product->product_description = $description;
        $product->product_type = $type;

        $product->save();
    }




    return redirect()->route('addproductform');

    }


    public function editProductform($id) {

        $product = Product::find($id);

        return view("adminedit")->with("product", $product);
    }
    public function editProductById(Request $request, $id)
    {
        // Retrieve the product by its ID
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->product_description = $request->product_description;
        $product->product_type = $request->product_type;
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('product_image'), $filename);



            $product->product_image = $filename;

        }

        $product->update();

        return redirect()->route('adminproduct');
    }

    public function deleteProductById($id)
    {
        // Retrieve the product by its ID
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('adminproduct');
        }

        // Delete the product
        $product->delete();

        return redirect()->route('adminproduct');

    }

    public function productView($id) {

        $product = Product::find($id);

        return view('adminview')->with('product',$product);

    }


    public function customerView($id) {

        $product = Product::find($id);

        return view('customer.customerview')->with('product',$product);

    }
}