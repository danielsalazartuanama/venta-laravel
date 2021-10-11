<?php

namespace App\Http\Controllers;

use App\Product;
use App\ShoppingCart;
use App\ShoppingCartDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        //$product = Product::find($request->product_id);

        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->my_store($product, $request);
        return back();
    }
    public function store_a_product(Request $request, Product $product)
    {
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->store_a_product($product);
        return back();
    }

    
    public function show(ShoppingCartDetails $shoppingCartDetails)
    {
        //
    }   
    public function edit(ShoppingCartDetails $shoppingCartDetails)
    {
        //
    }   
    public function update(Request $request, ShoppingCartDetails $shoppingCartDetails)
    {
        //
    }  
    public function destroy(ShoppingCartDetails $shoppingCartDetails)
    {
        //
    }
}
