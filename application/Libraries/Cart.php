<?php

namespace App\Libraries;

class Cart
{
    public static function checkId($carts, $product_id)
    {
        $check = -1;
        if (count($carts) > 0) {
            foreach ($carts as $pos => $item) {
                if ($item['id'] == $product_id) {
                    $check = $pos;
                    break;
                }
            }
        }
        return $check;
    }
    public static function addCart($name, $cart_item)
    {
        $carts = [];
        if (isset($_SESSION[$name])) {
            $carts = $_SESSION[$name];
        }
        if (count($carts) > 0) {
            $product_id = $cart_item['id'];
            $pos = self::checkId($carts, $product_id);
            if ($pos == -1) {
                $carts[] = $cart_item;
            } else {
                $carts[$pos]['qty']++;
            }
        } else {
            $carts[] = $cart_item;
        }
        $_SESSION[$name] = $carts;
    }
    public static function updateCart($name, $id, $qty)
    {
        $carts = [];
        if (isset($_SESSION[$name])) {
            $carts = $_SESSION[$name];
        }
        $pos = self::checkId($carts, $id);
        if ($pos != -1) {
            if ($qty == 0) {
                unset($carts[$pos]);
            } else {
                $carts[$pos]['qty'] = $qty;
            }
        }
        $_SESSION[$name] = $carts;
    }
    public static function removeCart($name, $id)
    {
        $carts = [];
        if (isset($_SESSION[$name])) {
            $carts = $_SESSION[$name];
        }
        $pos = self::checkId($carts, $id);
        if ($pos != -1) {
            unset($carts[$pos]);
        }
        $_SESSION[$name] = $carts;
    }
    public static function getTotalPrice($name)
    {
        $carts = [];
        if (isset($_SESSION[$name])) {
            $carts = $_SESSION[$name];
        }
        $total_price = 0;
        foreach ($carts as $item) {
            if ($item['pricesale'] != null) {
                $total_price += $item['pricesale'] * $item['qty'];
            } else {
                $total_price += $item['price'] * $item['qty'];
            }
        }
        return $total_price;
    }
    public static function getContent($name)
    {
        return $_SESSION[$name] ?? [];
    }
}
