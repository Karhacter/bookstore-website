<?php

use App\Libraries\Cart;

$id = $_REQUEST['deletecart'];
Cart::removeCart('cart', $id);
header('location:index.php?opt=cart');
