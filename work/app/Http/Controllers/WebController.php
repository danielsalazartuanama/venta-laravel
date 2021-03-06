<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{




    public function about_us()
    {
        return view('web.about_us');
    }
    public function checkout()
    {
        return view('web.checkout');
    }
    public function blog_details()
    {
        return view('web.blog_details');
    }
    public function blog()
    {
        return view('web.blog');
    }
    public function cart()
    {
        return view('web.cart');
    }
    public function contact_us()
    {
        return view('web.contact_us');
    }
    public function login_register()
    {
        return view('web.login_register');
    }
    public function shop_grid()
    {
        //controlar los products cuanto se va poner
        $products = Product::get_active_products()->paginate(12);
        // dd($products);
        return view('web.shop_grid', compact('products'));
    }
    public function product_details(Product $product)
    {
        return view('web.product_details', compact('product'));
    }
    public function my_account()
    {
        return view('web.my_account');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
