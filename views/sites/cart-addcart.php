<?php

use App\Libraries\Cart;
use App\Models\Product;

if (isset($_REQUEST['addcart'])) {

    $id = $_GET['id'];
    $product = Product::find($id);

    $qty = $_GET['qty'];

    $cart_item = [
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price,
        'pricesale' => $product->pricesale,
        'qty' => $qty,
        'image' => $product->image
    ];
    Cart::addCart('cart', $cart_item);
    echo count($_SESSION['cart']);
}
