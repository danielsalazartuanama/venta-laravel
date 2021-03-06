<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ShoppingCart extends Model
{
    protected $fillable = [
        'status',
        'user_id',
        'order_date',
    ];
    public function shopping_cart_details()
    {
        return $this->hasMany(ShoppingCartDetails::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function findOrCreateBySessionId($shopping_cart_id)
    {
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }
    public function quantity_of_products()
    {
        return $this->shopping_cart_details->sum('quantity');
    }
    public function total_price()
    {
        $total = 0;
        foreach ($this->shopping_cart_details as $key => $shopping_car_detail) {
            $total += $shopping_car_detail->price * $shopping_car_detail->quantity;
        }
        return $total;
    }
    public static function get_the_session_shopping_cart()
    {
        $session_name = 'shopping_cart_id';
        $shopping_car_id = Session::get($session_name);
        $shopping_cart = self::findOrCreateBySessionId($shopping_car_id);
        return $shopping_cart;
    }
    public function my_store($product, $request)
    {
        $this->shopping_cart_details()->create([
            'quantity' => $request->quantity,
            'price' => $product->sell_price,
            'product_id' => $product->id,
        ]);
    }
    public function store_a_product($product)
    {
        $this->shopping_cart_details()->create([
            'price' => $product->sell_price,
            'product_id' => $product->id,
        ]);
    }
}
