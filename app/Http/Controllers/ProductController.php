<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //

    public function getAllProduct() {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

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

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        return view("adminadd");
    }
    public function addProduct(Request $request)
    {
        try {
            $name = $request->product_name;
            $price = $request->product_retailprice;
            $quantity = $request->product_quantity;
            $description = $request->product_description;
            $type = $request->product_type;
            $wholesale = $request->product_wholesaleprice;

            // Validation: Ensure wholesale price is lower than the retail price
            if ($wholesale >= $price) {
                return redirect()->route('addproductform')->with('error', 'Wholesale price must be lower than the retail price.');
            }

            // Validation: Check if product with the same name already exists
            $existingProduct = Product::where('product_name', $name)->first();
            if ($existingProduct) {
                return redirect()->route('addproductform')->with('error', 'A product with the same name already exists.');
            }

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
                $product->product_wholesaleprice = $wholesale;

                $product->save();

                return redirect()->route('addproductform')->with('success', 'Product added successfully.');
            } else {
                return redirect()->route('addproductform')->with('error', 'Please upload a product image.');
            }
        } catch (\Exception $e) {
            return redirect()->route('addproductform')->with('error', 'Error adding product');
        }
    }

    public function editProductform($id) {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $product = Product::find($id);

        return view("adminedit")->with("product", $product);
    }
    public function editProductById(Request $request, $id)
    {
        try {
            // Retrieve the product by its ID
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('adminproduct')->with('error', 'Product not found.');
            }

            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_description = $request->product_description;
            $product->product_type = $request->product_type;
            $product->product_wholesaleprice = $request->product_retailprice;

            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('product_image'), $filename);
                $product->product_image = $filename;
            }

            $product->save();

            return redirect()->route('adminproduct')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('adminproduct')->with('error', 'Error updating product: ');
        }
    }

    public function deleteProductById($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('adminproduct')->with('error', 'Product not found.');
            }

            $product->delete();

            return redirect()->route('adminproduct')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('adminproduct')->with('error', 'Error deleting');
        }

    }

    public function productView($id) {

        $adminId = Session::get('id');

        if(!$adminId) {
            return redirect()->route('login');
        }

        $product = Product::find($id);

        return view('adminview')->with('product',$product);

    }


    public function customerView($id) {


        $customerId = Session::get('customer_id');
        if(!$customerId) {
            return redirect()->route('customerlogin');
        }

        $product = Product::find($id);

        return view('customer.customerview')->with('product',$product);

    }
}