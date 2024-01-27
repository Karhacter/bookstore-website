<?php

if (isset($_REQUEST['addcart'])) {
    require_once('views/sites/cart-addcart.php');
} else {
    if (isset($_REQUEST['updatecart'])) {
        require_once('views/sites/cart-updatecart.php');
    } else {
        if (isset($_REQUEST['deletecart'])) {
            require_once('views/sites/cart-deletecart.php');
        } else {
            require_once('views/sites/cart_content.php');
        }
    }
}
